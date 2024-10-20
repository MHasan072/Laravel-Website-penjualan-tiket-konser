<script>
    $(document).on('click', '#button_cara_bayar', function() {
        $('.modal-title').css('float', 'right');
        $('.modal-title').css('text-align', 'center');
        $('.modal-title').css('width', '100%');
        $('.modal-title').css('margin-right', '24px');

        $('.modal-title').text('Cara Bayar Tiket');
        $('#modal_bayar').modal('show');
    });

    //form simpan tiket form
    $(document).ready(function() {
        // Ketika form disubmit
        $('.ticket-form').on('submit', function(event) {
            event.preventDefault(); // Mencegah halaman refresh

            // Ambil data form
            var formData = new FormData(this);

            // Lakukan request ajax
            $.ajax({
                url: "{{ route('store.tiket') }}", // Route yang digunakan untuk menyimpan data
                method: 'POST',
                data: formData,
                contentType: false, // Agar bisa mengirim file (multipart/form-data)
                processData: false,
                dataType: 'json',
                beforeSend: function() {
                    $('button[type="submit"]').prop('disabled', true).text(
                    'Memproses...'); // Disable button
                },
                success: function(response) {
                    // Jika berhasil
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pesanan Telah dibuat',
                            text: response
                            .message, // Pastikan ini dari response yang benar
                            showConfirmButton: false,
                            timer: 1500 // Waktu tampil Swal
                        });

                        setTimeout(function() {
                            // Redirect ke halaman resi
                            window.location.href = response
                            .receipt_url; // Menggunakan URL yang dikembalikan
                        }, 1500); // Tunda redirect sampai Swal selesai
                    } else {
                        alert('Terjadi kesalahan: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    try {
                        // Parsing response JSON
                        var response = JSON.parse(xhr.responseText);

                        // Jika ada error, tampilkan error sesuai dengan field form
                        if (response.errors) {
                            // Menampilkan error untuk setiap field yang memiliki kesalahan
                            $('#error_nama').text(response.errors['tiket_nama']);
                            $('#error_email').text(response.errors['tiket_email']);
                            $('#error_nohp').text(response.errors['tiket_nohp']);
                            $('#error_event').text(response.errors['id_event']);
                            $('#error_nik').text(response.errors['tiket_nik']);
                            $('#error_payment_proof').text(response.errors[
                            'payment_proof']);
                        } else {
                            // Jika tidak ada key errors, tampilkan pesan error umum
                            alert('An unexpected error occurred: ' + response.message);
                        }
                    } catch (e) {
                        // Jika parsing gagal atau respon bukan JSON valid, tampilkan pesan error default
                        alert('An error occurred. Please try again.');
                        console.error('Error parsing response: ', e);
                    }
                },
                complete: function() {
                    // Setelah request selesai
                    $('button[type="submit"]').prop('disabled', false).text('Beli Tiket');
                }
            });
        });

        // Fungsi untuk menyembunyikan pesan error saat pengguna mulai mengetik di setiap input

        // Nama
        function hideErrorNama() {
            document.getElementById('error_nama').innerText = '';
        }
        document.getElementById('tiket_nama').addEventListener('input', hideErrorNama);
        // Email
        function hideErrorEmail() {
            document.getElementById('error_email').innerText = '';
        }
        document.getElementById('tiket_email').addEventListener('input', hideErrorEmail);
        // No HP
        function hideErrorNohp() {
            document.getElementById('error_nohp').innerText = '';
        }
        document.getElementById('tiket_nohp').addEventListener('input', hideErrorNohp);
        // Event (Dropdown)
        function hideErrorEvent() {
            document.getElementById('error_event').innerText = '';
        }
        document.getElementById('id_event').addEventListener('change', hideErrorEvent);
        // NIK
        function hideErrorNik() {
            document.getElementById('error_nik').innerText = '';
        }
        document.getElementById('tiket_nik').addEventListener('input', hideErrorNik);
        // Bukti Pembayaran
        function hideErrorPaymentProof() {
            document.getElementById('error_payment_proof').innerText = '';
        }
        document.getElementById('payment_proof').addEventListener('input', hideErrorPaymentProof);

    });
</script>
