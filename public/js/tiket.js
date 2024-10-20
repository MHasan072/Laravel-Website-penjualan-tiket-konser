$(document).ready(function () {
    var table = $("#table_pembelian").DataTable({
        info: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: url_tiket,
        },
        columns: [
            { data: "purchase_code" },
            { data: "id_event" },
            {
                data: null,
                render: function (data, type, row) {
                    return row.tiket_nama + '<br>' + row.tiket_email;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return row.tiket_nik + '<br>' + row.tiket_nohp;
                }
            },
            { data: "total_price" },
            {
                data: "payment_status",
                render: function (data, type, row) {
                    return data == 0 ? 'Belum Bayar' : 'Sudah Bayar';
                }
            },
            {
                data: "payment_proof",
                render: function (data, type, row) {
                    return data
                        ? `<img src="/uploads/${data}" alt="Bukti Pembayaran" width="100" />`
                        : 'Tidak ada bukti';
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `<button class="btn btn-primary change-status-btn" data-id="${row.id_purchases}">Ubah Status</button>`;
                }
            }
        ],
        order: [[1, "asc"]],
    });

    // Event delegation for the button click
    $('#table_pembelian tbody').on('click', '.change-status-btn', function() {
        var id_purchases = $(this).data('id');
        console.log(id_purchases); // Check the value

        $.ajax({
            url: `/tiket/change-payment-status/${id_purchases}`,
            type: 'POST',
            success: function(response) {
                if (response.status == 'success') {
                    alert(response.message);
                    // Refresh the table
                    table.ajax.reload();
                } else {
                    alert('Terjadi kesalahan saat mengubah status pembayaran.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error response for debugging
            }
        });
    });
});
