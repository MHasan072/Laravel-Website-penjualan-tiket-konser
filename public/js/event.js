$(document).ready(function () {
    var table = $("#table_event").DataTable({
        info: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: url_event,
        },
        columns: [
            {
                data: "id_event",
                orderable: false,
                render: function (data, type, row) {
                    var editButton = `<button class="btn btn-primary btn-sm edit-event" data-id="${data}"><i class="mdi mdi-pencil"></i></button>`;
                    var deleteButton = `<button class="btn btn-danger btn-sm delete-event" data-id="${data}"><i class="mdi mdi-delete"></i></button>`;
                    return editButton + " " + deleteButton; // Menggabungkan tombol Edit dan Delete
                }
            },
            { data: "event_name" },
            { data: "event_date" },
            { data: "venue" }, 
            { data: "price" }, 
            { data: "description" },
        ],
        order: [[1, "asc"]],
        initComplete: function () {},
        createdRow: function (row, data, index) {
            if (data.extn === "") {
                $(row).find("td:first").removeClass("details-control");
            }
        },
        rowCallback: function (row, data, index) {},
    });
});
