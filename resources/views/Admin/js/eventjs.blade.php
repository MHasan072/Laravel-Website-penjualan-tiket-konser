<script>
    $(document).ready(function() {
        $(document).on('click', '#tambah_event', function() {
            $('.modal-title').css('float', 'right');
            $('.modal-title').css('text-align', 'center');
            $('.modal-title').css('width', '100%');
            $('.modal-title').css('margin-right', '24px');

            $('.modal-title').text('Tambah Event');
            $('.action').val('Tambah');
            $('#form_result_event').html('');
            $('#form_event')[0].reset();
            $('#modal_event').modal('show');
        });

        //form submit event
        $('#form_event').on('submit', function(event) {
            event.preventDefault();
            var action_url = '';

            if ($('.action').val() == 'Tambah') {
                action_url = "{{ route('store.event') }}";
            }
            if ($('.action').val() == 'Edit') {
                action_url = "{{ route('update.event') }}";
            }
            console.log(action_url);
            $.ajax({
                url: action_url,
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        $('#modal_event').modal('hide');
                        html = '<div class="alert alert-success">' + data.success +
                            '</div>';
                        $('#form_event')[0].reset();
                        $('#table_event').DataTable().ajax.reload();
                    }
                    $('#form_result_event').html(html);
                }

            });
        });

        //form modal edit titik sampling
        $(document).on('click', '.edit-event', function() {
            var id_event = $(this).attr('data-id');
            $('#form_result_event').html('');
            $.ajax({
                url: "{{ route('edit.event') }}?id_event=" + id_event,
                method: "get",
                dataType: "json",
                success: function(data) {
                    $('#form_result_event').html('');
                    console.log(data);
                    // Populate the form fields with the existing data
                    $('#event_name').val(data.result.event_name);
                    $('#event_date').val(data.result.event_date);
                    $('#venue').val(data.result.venue);
                    $('#price').val(data.result.price);
                    $('#description').val(data.result.description);

                    $('#id_event_edit').val(data.result.id_event);
                    $('.modal-title').css('float', 'right');
                    $('.modal-title').css('text-align', 'center');
                    $('.modal-title').css('width', '100%');
                    $('.modal-title').css('margin-right', '24px');
                    $('.modal-title').text('Edit Data');

                    $('.action').val('Edit');

                    $('#form_event_button').val('Edit');

                    $('#modal_event').modal('show');
                }
            });
        });

        var id_event;

        $(document).on('click', '.delete-event', function() {
            id_event = $(this).attr('data-id');
            console.log(id_event);
            $('.modal-title').css('float', 'right');
            $('.modal-title').css('text-align', 'center');
            $('.modal-title').css('width', '100%');
            $('.modal-title').css('margin-right', '24px');
            $('.modal-title').text('Hapus Data');
            $('#hapusevent').modal('show');
        });

        $('#hapus_event').click(function() {
            $.ajax({
                url: "/event/destroy-event/" + id_event,
                beforeSend: function() {
                    $('#hapus_event').text('Delete');
                },
                success: function(data) {
                    console.log(data);

                    setTimeout(function() {
                        $('#hapusevent').modal('hide');
                        $('#table_event').DataTable().ajax.reload();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }, 2);
                }
            })
        });

    });
</script>
