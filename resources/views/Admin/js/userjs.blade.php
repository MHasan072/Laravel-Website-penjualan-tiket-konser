<script>
    $(document).ready(function() {
        // Modal untuk edit pengguna
        $(document).on('click', '.edit-user', function() {
            var id_user = $(this).attr('data-id'); // Ambil ID pengguna dari atribut data
            $('#form_result_user').html(''); // Kosongkan hasil form

            // Mengambil data pengguna untuk diedit
            $.ajax({
                url: "{{ route('edit.user', ':id') }}".replace(':id',
                id_user), // Ganti :id dengan ID pengguna
                method: "GET",
                dataType: "json",
                success: function(data) {
                    // Isi form dengan data pengguna yang ada
                    $('#name').val(data.result.name);
                    $('#email').val(data.result.email);
                    $('#no_hp').val(data.result.no_hp);
                    $('#id_user_edit').val(data.result.id_user); // Pastikan ini ada di form
                    $('.modal-title').text('Edit Pengguna'); // Judul modal
                    $('.action').val('Edit'); // Set aksi menjadi Edit
                    $('#modal_user').modal('show'); // Tampilkan modal
                },
                error: function() {
                    // Tampilkan pesan kesalahan jika terjadi
                    Swal.fire('Error', 'Terjadi kesalahan saat mengambil data pengguna.',
                        'error');
                }
            });
        });

        // Submit form untuk tambah/edit pengguna
        $('#form_user').on('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form default
            var action_url = '';

            if ($('.action').val() == 'Edit') {
                action_url = "{{ route('update.user', ':id') }}".replace(':id', $('#id_user_edit')
                .val());
            }

            $.ajax({
                url: action_url,
                method: "POST",
                data: $(this).serialize(), // Kirim data form
                dataType: "json",
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        // Menampilkan pesan kesalahan
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        $('#modal_user').modal('hide'); // Sembunyikan modal
                        html = '<div class="alert alert-success">' + data.success +
                        '</div>'; // Tampilkan pesan sukses
                        $('#form_user')[0].reset(); // Reset form
                        $('#table_user').DataTable().ajax.reload(); // Reload tabel
                    }
                    $('#form_result_user').html(html); // Tampilkan pesan di form
                },
                error: function(xhr) {
                    // Menangani kesalahan lainnya
                    var html = '<div class="alert alert-danger">';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        html += '<p>' + xhr.responseJSON.message + '</p>';
                    } else {
                        html += '<p>Terjadi kesalahan saat memperbarui data pengguna.</p>';
                    }
                    html += '</div>';
                    $('#form_result_user').html(html); // Tampilkan pesan di form
                }
            });
        });

        // Konfirmasi penghapusan pengguna
        var id_user; // Variabel untuk menyimpan ID pengguna yang akan dihapus

        $(document).on('click', '.delete-user', function() {
            id_user = $(this).attr('data-id'); // Ambil ID pengguna untuk dihapus
            $('.modal-title').text('Hapus Pengguna'); // Judul modal
            $('#modal_delete_user').modal('show'); // Tampilkan modal konfirmasi
        });

        $('#confirm_delete_user').click(function() {
            $.ajax({
                url: "/user/destroy-user/" + id_user, // Rute untuk menghapus pengguna
                method: "GET",
                success: function(data) {
                    $('#modal_delete_user').modal('hide'); // Sembunyikan modal
                    $('#table_user').DataTable().ajax.reload(); // Reload tabel
                    Swal.fire({
                        title: "Deleted!",
                        text: "Pengguna telah dihapus.", // Pesan sukses
                        icon: "success"
                    });
                },
                error: function() {
                    // Tampilkan pesan kesalahan jika terjadi
                    Swal.fire('Error', 'Terjadi kesalahan saat menghapus pengguna.',
                        'error');
                }
            });
        });
    });
</script>
