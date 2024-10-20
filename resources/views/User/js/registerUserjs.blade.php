<script>
    $(document).ready(function() {
        // AJAX submit for login and signup
        $('#authForm_register').on('submit', function(e) {
            e.preventDefault(); // Prevent form reload

            let formData = $(this).serialize();
            let formAction = $(this).attr('action');

            $.ajax({
                url: formAction,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil membuat Akun',
                            text: response
                            .success, // Ganti data.success menjadi response.success
                            showConfirmButton: false,
                            timer: 1500 // Adjust the timer as needed
                        });
                        setTimeout(function() {
                            window.location.href =
                            "{{ route('showlogin') }}"; // Redirect on success
                        }, 1500); // Tunda redirect sampai Swal selesai
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    try {
                        // Parsing response JSON
                        var response = JSON.parse(xhr.responseText);

                        // Jika ada error, tampilkan error sesuai dengan field form
                        if (response.errors) {
                            // Menampilkan error untuk setiap field yang memiliki kesalahan
                            $('#error_name').text(response.errors['name']);
                            $('#error_email').text(response.errors['email']);
                            $('#error_no_hp').text(response.errors['no_hp']);
                            $('#error_password').text(response.errors['password']);
                        } else {
                            // Jika tidak ada key errors, tampilkan pesan error umum
                            alert('An unexpected error occurred: ' + response.message);
                        }
                    } catch (e) {
                        // Jika parsing gagal atau respon bukan JSON valid, tampilkan pesan error default
                        alert('An error occurred. Please try again.');
                        console.error('Error parsing response: ', e);
                    }
                }
            });
        });

        // Nama
        function hideErrorNama() {
            document.getElementById('error_name').innerText = '';
        }
        document.getElementById('signup-name').addEventListener('input', hideErrorNama);
        // Email
        function hideErrorEmail() {
            document.getElementById('error_email').innerText = '';
        }
        document.getElementById('signup-email').addEventListener('input', hideErrorEmail);
        // No HP
        function hideErrorNohp() {
            document.getElementById('error_no_hp').innerText = '';
        }
        document.getElementById('signup-no_hp').addEventListener('input', hideErrorNohp);
        // Password
        function hideErrorEvent() {
            document.getElementById('error_password').innerText = '';
        }
        document.getElementById('signup-password').addEventListener('input', hideErrorEvent);
    });
</script>
