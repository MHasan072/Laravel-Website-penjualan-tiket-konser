<script>
    var url_tiket = "{{ route('data_tiket') }}";

    // Setup CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        var table = $("#table_pembelian").DataTable({
            info: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: url_tiket,
            },
            columns: [{
                    data: "purchase_code"
                },
                {
                    data: "event_name"
                }, // Ganti id_event dengan event_name
                {
                    data: null,
                    render: function(data, type, row) {
                        return row.tiket_nama + '<br>' + row.tiket_email;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return row.tiket_nik + '<br>' + row.tiket_nohp;
                    }
                },
                {
                    data: "total_price"
                },
                {
                    data: "payment_status",
                    render: function(data, type, row) {
                        // Menggunakan tombol yang tidak dapat ditekan sebagai hiasan
                        return data == 0 ?
                            '<button class="btn btn-danger" disabled>Belum Bayar</button>' :
                            '<button class="btn btn-success" disabled>Sudah Bayar</button>';
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<a href="{{ route('viewPaymentProof', '') }}/${row.id_purchases}" class="btn btn-info">Lihat Bukti</a>`;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<button class="btn btn-primary change-status-btn" data-id="${row.id_purchases}">Ubah Status</button>`;
                    }
                }
            ],
            order: [
                [1, "asc"]
            ],
        });

        // Event delegation for the button click
        $('#table_pembelian tbody').on('click', '.change-status-btn', function() {
            var id_purchases = $(this).data('id');

            // Tampilkan konfirmasi dengan SweetAlert sebelum mengubah status pembayaran
            Swal.fire({
                title: 'Konfirmasi Validasi Pembayaran',
                text: "Apakah Anda yakin bukti pembayaran sudah benar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah status dan kirim tiket!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika admin mengkonfirmasi, lakukan request ke backend
                    $.ajax({
                        url: `/tiket/change-payment-status/${id_purchases}`,
                        type: 'POST',
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire(
                                    'Berhasil!',
                                    response.message,
                                    'success'
                                );
                                // Refresh the table
                                var table = $('#table_pembelian').DataTable();
                                table.ajax.reload();

                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan saat mengubah status pembayaran.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr
                                .responseText); // Log error response for debugging
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan pada server.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
