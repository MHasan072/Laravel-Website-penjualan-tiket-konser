<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Concertly - Halaman Tiket</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

        <link href="{{ asset('Styles/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Styles/css/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('Styles/css/templatemo-festava-live.css') }}" rel="stylesheet">

        <style>
            /* Konsistensi warna background dan teks */
            body {
                background-color: #000E20;
                /* Warna background sama dengan halaman sebelumnya */
                color: #ffffff;
                /* Warna teks */
            }

            /* Konsistensi tombol */
            button[type="submit"] {
                background-color: #007bff;
                /* Warna tombol */
                color: #fff;
                /* Warna teks tombol */
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 5px;
                /* Buat sedikit melengkung */
                width: 100%;
            }

            /* Konsistensi style radio button */
            .form-check-input {
                margin-right: 10px;
            }

            .form-check-label {
                color: #ffffff;
            }

            /* Overlay untuk section */
            .section-overlay {
                background-color: rgba(0, 0, 0, 0.5);
                /* Transparansi dan warna overlay */
            }

            /* Warna footer */
            .site-footer {
                background-color: #333;
                color: #ffffff;
            }

            .site-footer a {
                color: #ffffff;
            }

            .social-icon-link {
                color: #fff;
            }

            /* Konsistensi link */
            .site-footer {
                background-color: #000000;
                color: #ffffff;
            }

            .form-control {
                margin-bottom: 0.2rem;
                /* Jarak antara input dan span */
            }

            .error-text {
                display: block;
                /* Span sebagai blok */
                margin-top: 0.1rem;
                /* Jarak di atas span */
                font-size: 0.9rem;
                /* Ukuran font untuk span */
            }
        </style>
    </head>

    <body>

        <main>
            @include('User.partials.headerUser')

            <section class="ticket-section section-padding">
                <div class="section-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-10 mx-auto">
                            <form class="custom-form ticket-form mb-5 mb-lg-0" action="#" method="post"
                                enctype="multipart/form-data" role="form">
                                @csrf
                                <input type="hidden" name="id_user" value="{{ Auth::user()->id_user }}">
                                <input type="hidden" name="purchase_code" id="purchase_code">
                                <input type="hidden" name="total_price" id="total_price" value="">
                                <h2 class="text-center mb-4">Beli Tiket</h2>

                                <div class="ticket-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <span id="error_nama" class="text-danger error-text error_nama"></span>
                                            <input type="text" name="tiket_nama" id="tiket_nama" class="form-control"
                                                placeholder="Nama">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <span id="error_email" class="text-danger error-text error_email"></span>
                                            <input type="email" name="tiket_email" id="tiket_email"
                                                pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email">
                                        </div>
                                    </div>

                                    <span id="error_nohp" class="text-danger error-text error_nohp"></span>
                                    <input type="tel" class="form-control" name="tiket_nohp" id="tiket_nohp"
                                        placeholder="No Handphone">

                                    <h6>Pilih Event</h6>
                                    @php
                                        $events = DB::select('select * from events'); // Ambil data event
                                    @endphp

                                    <!-- Dropdown untuk memilih event -->
                                    <div class="row">
                                        <div class="col-12">
                                            <span id="error_event" class="text-danger error-text error_event"></span>
                                            <select name="id_event" id="id_event" class="form-control">
                                                <option value="">Pilih Event</option>
                                                @foreach ($events as $event)
                                                    <option value="{{ $event->id_event }}"
                                                        data-price="{{ $event->price }}">
                                                        {{ $event->event_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <input type="text" id="ticket_price_display" class="form-control"
                                                placeholder="Harga Tiket" readonly>
                                        </div>
                                    </div>

                                    <span id="error_nik" class="text-danger error-text error_nik"></span>
                                    <input type="text" name="tiket_nik" id="tiket_nik" class="form-control"
                                        placeholder="NIK">

                                    <!-- Tombol untuk memunculkan modal cara membayar -->
                                    <button type="button" id="button_cara_bayar" class="btn btn-info btn-sm mb-2"
                                        data-bs-toggle="modal" data-bs-target="#paymentModal">
                                        Cara Membayar
                                    </button>

                                    <!-- Form untuk mengupload bukti pembayaran -->
                                    <div class="row">
                                        <div class="col-12">
                                            <span id="error_payment_proof"
                                                class="text-danger error-text error_payment_proof"></span>
                                            <input type="file" name="payment_proof" id="payment_proof"
                                                class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                    <input type="hidden" name="payment_status" id="payment_status"
                                        class="form-control" value="0">
                                    <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                        <button type="submit" class="form-control">Beli Tiket</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="site-footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <h2 class="text-white mb-lg-0">Concertly</h2>
                        </div>

                        <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center">
                            <ul class="social-icon d-flex justify-content-lg-end">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-twitter"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-apple"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-instagram"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-youtube"></span>
                                    </a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link">
                                        <span class="bi-pinterest"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-4 pb-2">
                        <h5 class="site-footer-title mb-3">Links</h5>

                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Home</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">About</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Artists</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Schedule</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Pricing</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <h5 class="site-footer-title mb-3">Have a question?</h5>

                        <p class="text-white d-flex mb-1">
                            <a href="tel: 090-080-0760" class="site-footer-link">
                                090-080-0760
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <a href="mailto:hello@company.com" class="site-footer-link">
                                hello@company.com
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                        <h5 class="site-footer-title mb-3">Location</h5>

                        <p class="text-white d-flex mt-3 mb-2">
                            Silang Junction South, Tagaytay, Cavite, Philippines</p>

                        <a class="link-fx-1 color-contrast-higher mt-3" href="#">
                            <span>Our Maps</span>
                            <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="16" cy="16" r="15.5"></circle>
                                    <line x1="10" y1="18" x2="16" y2="12"></line>
                                    <line x1="16" y1="12" x2="22" y2="18"></line>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-12 mt-5">
                            <p class="copyright-text">Copyright © 2036 Festava Live Company</p>
                            <p class="copyright-text">Distributed by: <a href="https://themewagon.com">ThemeWagon</a>
                            </p>
                        </div>

                        <div class="col-lg-8 col-12 mt-lg-5">
                            <ul class="site-footer-links">
                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Terms &amp; Conditions</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Privacy Policy</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Your Feedback</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="{{ asset('Styles/js/jquery.min.js') }}"></script>
        <script src="{{ asset('Styles/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('Styles/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('Styles/js/custom.js') }}"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


        <script>
            // JavaScript untuk mengupdate total_price berdasarkan event yang dipilih
            document.getElementById('id_event').addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var price = selectedOption.getAttribute('data-price'); // Ambil harga dari data-price
                document.getElementById('total_price').value = price; // Set value total_price
                document.getElementById('ticket_price_display').placeholder = 'Rp ' + new Intl.NumberFormat('id-ID')
                    .format(price);
            });
        </script>

        @include('User.modal.carabayar')
        @include('User.js.tiketjs')

    </body>

</html>
