<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Register Concertly</title>

        <!-- CSS FILES -->
        <link rel="icon" type="image/png" href="{{ asset('images/logoconcertly-rounded.png') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

        <link href="{{ asset('Styles/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Styles/css/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('Styles/css/templatemo-festava-live.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Outfit', sans-serif;
                background-color: #f8f9fa;
                /* Latar belakang halaman */
            }

            .navbar {
                background-color: #010914
                    /* Warna navbar */
            }

            .navbar a {
                color: white;
                /* Warna teks navbar */
            }

            .navbar a:hover {
                color: #e2e2e2;
                /* Warna teks navbar saat hover */
            }

            .ticket-section {
                background-color: #000E20;
                padding: 50px 30px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                min-height: 90vh;
                /* Tinggi minimum untuk section form */
            }

            .submit-btn {
                background-color: #28a745;
                /* Warna tombol */
                border: none;
                color: white;
                padding: 12px 20px;
                border-radius: 5px;
                font-size: 16px;
                transition: background-color 0.3s;
                cursor: pointer;
                width: 100%;
                /* Tombol memenuhi lebar */
            }

            .submit-btn:hover {
                background-color: #218838;
                /* Warna tombol saat hover */
            }

            .form-title {
                color: #333;
                /* Warna judul form */
                font-weight: bold;
                margin-bottom: 20px;
            }

            .form-holder {
                margin-bottom: 20px;
            }

            .form-holder .input {
                border-radius: 4px;
                /* Sudut melengkung input */
                border: 1px solid #ced4da;
                /* Border input */
                padding: 10px;
                /* Ruang dalam input */
                width: 100%;
                /* Lebar input penuh */
                margin-bottom: 15px;
            }

            .form-holder .input:focus {
                border-color: #007bff;
                /* Border input saat fokus */
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
                /* Bayangan saat fokus */
            }

            .form-structor {
                position: relative;
            }

            .form-hidden {
                display: none;
            }

            .text-center a {
                color: #007bff;
                text-decoration: none;
            }

            .text-center a:hover {
                text-decoration: underline;
            }

            footer {
                background-color: #007bff;
                color: white;
                padding: 20px 0;
                /* Padding untuk footer */
                position: relative;
                /* Mengatur posisi footer */
            }

            .site-footer {
                padding: 20px 0;
            }

            .site-footer a {
                color: #ffffff;
            }

            .site-footer a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>

        <header>
            @include('User.partials.headerUser') <!-- Pertahankan header yang ada -->
        </header>

        <main>
            <section class="ticket-section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-10 mx-auto">
                            <form class="custom-form ticket-form mb-5 mb-lg-0" action="{{ route('registeruser') }}"
                                method="post" id="authForm_register"> <!-- Ubah 'loginuser' menjadi 'loginuserpost' -->
                                @csrf
                                <div class="text-center mb-4">
                                    <img src="{{ asset('images/logoconcertly-rounded.png') }}" alt="Festava Live Logo"
                                        class="img-fluid" style="max-width: 150px;">
                                </div>
                                <h5 class="text-left mb-4" id="form-title">Sign
                                    up</h5>

                                <div class="form-structor">
                                    <!-- Sign up form -->
                                    <div class="signup form" id="signup-form">
                                        <div class="form-holder">
                                            <span id="error_name" class="text-danger error-text error_name"></span>
                                            <input type="text" class="input" placeholder="Masukkan Nama"
                                                name="name" id="signup-name" />

                                            <span id="error_email" class="text-danger error-text error_email"></span>
                                            <input type="email" class="input" placeholder="Masukkan Email"
                                                name="email" id="signup-email" />

                                            <span id="error_no_hp" class="text-danger error-text error_no_hp"></span>
                                            <input type="text" class="input" placeholder="Masukkan No HP"
                                                name="no_hp" id="signup-no_hp" />

                                            <span id="error_password"
                                                class="text-danger error-text error_password"></span>
                                            <input type="password" class="input" placeholder="Masukkan Password"
                                                name="password" id="signup-password" />
                                        </div>
                                        <button type="submit" class="submit-btn" id="signup-btn">Sign up</button>
                                        <p class="text-center mt-3">
                                            Tidak punya akun? <a href="{{ route('showlogin') }}" id="show-login">Log
                                                in</a>
                                        </p>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </section>
        </main>

        @include('User.partials.footerauth')

        <!-- JAVASCRIPT FILES -->
        <script src="{{ asset('Styles/js/jquery.min.js') }}"></script>
        <script src="{{ asset('Styles/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('Styles/js/custom.js') }}"></script>

        @include('User.js.registerUserjs')

    </body>

</html>
