$(document).ready(function () {
    var table = $("#table_user").DataTable({
        info: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: url_user,
        },
        columns: [
            {
                data: null,
                orderable: false,
                render: function (data, type, row) {
                    var editButton = `<button class="btn btn-primary btn-sm edit-user" data-id="${row.id_user}"><i class="mdi mdi-pencil"></i></button>`;
                    var deleteButton = `<button class="btn btn-danger btn-sm delete-user" data-id="${row.id_user}"><i class="mdi mdi-delete"></i></button>`;
                    return editButton + " " + deleteButton; // Menggabungkan tombol Edit dan Delete
                }
            },
            { data: "name" }, // Kolom Nama
            { data: "email" }, // Kolom Email
            { data: "no_hp" }, // Kolom No HP
        ],
        order: [[0, "asc"]], // Mengurutkan berdasarkan kolom Nama
        initComplete: function () {},
        createdRow: function (row, data, index) {},
        rowCallback: function (row, data, index) {},
    });

    // Event listener for edit button
    $('#table_user tbody').on('click', '.edit-user', function () {
        var id = $(this).data('id');
        // Tambahkan kode untuk menampilkan form edit pengguna di sini
        console.log("Edit User ID:", id);
    });

    // Event listener for delete button
    $('#table_user tbody').on('click', '.delete-user', function () {
        var id = $(this).data('id');
        // Tambahkan kode untuk menghapus pengguna di sini
        console.log("Delete User ID:", id);
    });
});
