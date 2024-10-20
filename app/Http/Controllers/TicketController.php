<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\db;
use App\Mail\TicketPurchased;
use Illuminate\Support\Facades\Mail;
use App\TicketPurchase;
use App\Event;
use App\User;

class TicketController extends Controller
{
    public function index()
    {
        // Mengambil semua event dari database
        $events = Event::all(); // Menggunakan model Event untuk mendapatkan data
        return view('path.to.your.view', compact('events')); // Pastikan ganti 'path.to.your.view' dengan path yang sesuai
    }

    public function dataTiket(Request $request)
    { 
        if ($request->ajax()) {
            // Mengambil data pembelian tiket dan nama event
            $data = \DB::select("
                SELECT 
                    ticket_purchases.id_purchases, 
                    ticket_purchases.id_user, 
                    ticket_purchases.id_event, 
                    ticket_purchases.purchase_code, 
                    ticket_purchases.tiket_nama, 
                    ticket_purchases.tiket_email, 
                    ticket_purchases.tiket_nohp, 
                    ticket_purchases.tiket_nik, 
                    ticket_purchases.total_price, 
                    ticket_purchases.payment_status, 
                    ticket_purchases.payment_proof,
                    events.event_name 
                FROM 
                    ticket_purchases 
                JOIN 
                    events ON ticket_purchases.id_event = events.id_event
            ");

            // Format total_price dan kembalikan data yang sudah diformat
            $formattedData = array_map(function($item) {
                $item->total_price = 'Rp ' . number_format($item->total_price, 0, ',', '.');
                return $item;
            }, $data);
            
            // Menggunakan formatted data untuk DataTables
            $dt = DataTables::of($formattedData);
            $dt->rawColumns(['action']);
            
            return $dt->make(true);
        }
    }



    public function dataEvent(Request $request)
    { 
            if ($request->ajax()) {
                // Fetching events data
                $data = \DB::select("SELECT events.id_event,events.event_name,events.event_date,events.venue,events.price,events.description
                    FROM events");
                    
                        $dt= DataTables::of($data);
                        
                        $dt->rawColumns(['action']);
                        return $dt->make(true);
                    //dd($data);
            }
                  
    }

    // Fungsi untuk mengonversi id_event ke huruf alfabet
    private function convertToAlphabets($num)
    {
        $alphabets = '';
        while ($num > 0) {
            $remainder = ($num - 1) % 26;
            $alphabets = chr(65 + $remainder) . $alphabets;
            $num = intval(($num - 1) / 26);
        }
        return $alphabets;
    }

    public function showReceipt($id)
    {
        // Ambil data pembelian berdasarkan ID
        $purchase = TicketPurchase::with('event')->findOrFail($id);
        
        // Tampilkan view resi dengan data pembelian
        return view('User.page.resipembayaran', compact('purchase'));
    }

    public function storeTiket(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'id_user' => 'required',
            'id_event' => 'required',
            'tiket_nama' => 'required',
            'tiket_email' => 'required|email',
            'tiket_nohp' => 'required|numeric',
            'tiket_nik' => 'required|numeric',
            'payment_proof' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi bukti pembayaran
        ], [
            'id_user.required' => 'User ID tidak boleh kosong',
            'id_event.required' => 'Event tidak boleh kosong',
            'tiket_nama.required' => 'Nama tidak boleh kosong',
            'tiket_email.required' => 'Email tidak boleh kosong',
            'tiket_email.email' => 'Masukkan email dengan format yang benar, contoh: contoh@gmail.com',
            'tiket_nohp.required' => 'No HP tidak boleh kosong',
            'tiket_nohp.numeric' => 'No HP harus angka',
            'tiket_nik.required' => 'NIK tidak boleh kosong',
            'tiket_nik.numeric' => 'NIK harus berisi angka',
            'payment_proof.image' => 'Bukti pembayaran harus berupa gambar',
            'payment_proof.mimes' => 'Bukti pembayaran hanya boleh berupa jpeg, png, jpg, atau gif',
            'payment_proof.max' => 'Bukti pembayaran tidak boleh lebih dari 2MB'
        ]);

        // Simpan bukti pembayaran jika ada
        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename); // Pindahkan file ke folder uploads
        } else {
            $filename = null; // Set null jika tidak ada file bukti pembayaran
        }

        // Generate purchase_code
        $id_event = $request->id_event;
        $id_user = $request->id_user;
        $currentDate = date('dmy'); // Format tanggal: ddmmyy

        // Panggil fungsi convertToAlphabets untuk mengubah id_event menjadi kode alfabet
        $eventCode = $this->convertToAlphabets($id_event);

        // Format: Kode event + tanggal (ddmmyy) + id_user
        $purchase_code = $eventCode . $currentDate . $id_user;

        // Simpan data tiket ke database dan simpan hasilnya ke variabel $purchase
        $purchase = TicketPurchase::create([
            'id_user' => $id_user,
            'id_event' => $id_event,
            'purchase_code' => $purchase_code, // Kode yang baru digenerate
            'tiket_nama' => $request->tiket_nama,
            'tiket_email' => $request->tiket_email,
            'tiket_nohp' => $request->tiket_nohp,
            'tiket_nik' => $request->tiket_nik,
            'total_price' => $request->total_price,
            'payment_status' => 0, // Default payment status 0 (belum bayar)
            'payment_proof' => $filename // Nama file bukti pembayaran
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Pembelian tiket berhasil!',
            'receipt_url' => route('showReceipt', ['id' => $purchase->id_purchases])
        ]);
    }

    public function changePaymentStatus($id)
    {
        // Ambil data pembelian tiket berdasarkan ID
        $purchase = TicketPurchase::with('user', 'event')->findOrFail($id);

        // Cek status pembayaran, jika belum bayar (0), ubah menjadi sudah bayar (1)
        if ($purchase->payment_status == 0) {
            // Ubah status pembayaran
            $purchase->payment_status = 1;
            
            // Simpan perubahan ke database
            $purchase->save();

            // Kirim email setelah pembayaran divalidasi oleh admin
            try {
                Mail::to($purchase->tiket_email)->send(new TicketPurchased($purchase)); // Mengirim email tiket
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Status pembayaran berhasil diubah, tetapi gagal mengirim email: ' . $e->getMessage(),
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Status pembayaran berhasil diubah dan email e-ticket telah dikirim.',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Pembayaran sudah divalidasi sebelumnya.',
            ]);
        }
    }


    public function viewPaymentProof($id)
    {
        // Fetch the TicketPurchase record
        $purchase = TicketPurchase::findOrFail($id);

        // Ensure payment_proof is available
        if (!$purchase->payment_proof) {
            return redirect()->back()->with('error', 'Bukti pembayaran tidak ditemukan.');
        }

        return view('Admin.page.view_payment_proof', compact('purchase'));
    }



}


