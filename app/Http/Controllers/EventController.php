<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\db;

class EventController extends Controller
{
    // Show the event index view
    public function index()
    {
        return view('Admin.page.eventPage'); // Pastikan nama view sesuai
    }

    // Fetch event data for DataTables
    public function dataEvent(Request $request)
    { 
        if ($request->ajax()) {
            // Fetching events data
            $data = \DB::select("SELECT events.id_event, events.event_name, events.event_date, events.venue, events.price, events.description
                FROM events");
            
            // Format price dan kembalikan data yang sudah diformat
            $formattedData = array_map(function($item) {
                $item->price = 'Rp ' . number_format($item->price, 0, ',', '.');
                return $item;
            }, $data);
            
            $dt = DataTables::of($formattedData);
            
            $dt->rawColumns(['action']);
            return $dt->make(true);
        }
    }


    
    public function dataEventJson(Request $request)
    { 
            if ($request->ajax()) {
                // Fetching events data
                $data = \DB::select("SELECT id_event, event_name, event_date, venue, price, description FROM events");
                
                return response()->json(['data' => $data]);  // Mengirimkan data dalam format JSON
            }
                  
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeEvent(Request $request)
    {
        $request->validate([
            'event_name' => 'required', 
            'event_date' => 'required',
            'venue' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ], [
            'event_name.required' => 'Nama Event tidak boleh kosong',
            'event_date.required' => 'Tanggal tidak boleh kosong',
            'venue.required' => 'Lokasi tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong',
            'description.required' => 'Deskripsi tidak boleh kosong'
            
        ]);
        
        DB::table('events')->insert([
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'venue' => $request->venue,
            'price' => $request->price,
            'description' => $request->description
        ]);


        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editEvent(Request $request)
    {
        if ($request->ajax()) {
            $event = $request->query('id_event');
            $data = Event::where('id_event', $event)->first();

            if ($data) {
                return response()->json(['result' => $data]);
            } else {
                return response()->json(['error' => 'Data not found'], 404);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updateEvent(Request $request)
    {
        $request->validate([
            'event_name' => 'required', 
            'event_date' => 'required',
            'venue' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ], [
            'event_name.required' => 'Nama Event tidak boleh kosong',
            'event_date.required' => 'Tanggal tidak boleh kosong',
            'venue.required' => 'Lokasi tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong',
            'description.required' => 'Deskripsi tidak boleh kosong'
            
        ]);
        

        $event_data = array(
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'venue' => $request->venue,
            'price' => $request->price,
            'description' => $request->description
        );

        Event::where('id_event',$request->id_event)->update($event_data);


        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroyEvent($id)
    {
        $event = event::where('id_event',$id);
        $event->delete();
        return response()->json(['success' => 'Data is successfully DELETED']);
    }
}