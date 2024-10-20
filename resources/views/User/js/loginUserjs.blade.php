<script>
    $(document).ready(function() {
        // Set up AJAX to include CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // AJAX submit for login
        $('#authForm_login').on('submit', function(e) {
            e.preventDefault(); // Prevent form reload
            $('#error-message').addClass('d-none').text(''); // Reset error message

            let formData = $(this).serialize();
            let formAction = $(this).attr('action');
            console.log(formData);

            $.ajax({
                url: formAction,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    } else {
                        $('#error-message').removeClass('d-none').text(response
                            .message); // Show error message
                    }
                },
                error: function(xhr, status, error) {
                    try {
                        // Parsing response JSON
                        var response = JSON.parse(xhr.responseText);

                        // Jika ada error, tampilkan error sesuai dengan field form
                        if (response.errors) {
                            // Menampilkan error untuk setiap field yang memiliki kesalahan
                            $('#error_email').text(response.errors['email']);
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

        // Fungsi untuk menyembunyikan pesan error saat pengguna mulai mengetik di setiap input

        // Email
        function hideErrorEmail() {
            document.getElementById('error_email').innerText = '';
        }
        document.getElementById('login-email').addEventListener('input', hideErrorEmail);

        // Password
        function hideErrorPassword() {
            document.getElementById('error_password').innerText = '';
        }
        document.getElementById('login-password').addEventListener('input', hideErrorPassword);
    });
</script>
