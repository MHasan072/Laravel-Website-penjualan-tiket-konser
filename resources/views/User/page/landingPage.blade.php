<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Concertly</title>

        <!-- CSS FILES -->

        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" type="image/png" href="{{ asset('images/logoconcertly-rounded.png') }}">

        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

        <link href="{{ asset('Styles/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Styles/css/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('Styles/css/templatemo-festava-live.css') }}" rel="stylesheet">
        <style>
            /* Ukuran teks lebih kecil */
            .pricing-tag {
                font-size: 14px;
                /* Ukuran teks untuk tanggal event lebih kecil */
            }

            .pricing-tag span {
                font-size: 15px;
                /* Ukuran teks tanggal lebih kecil */
                color: #ffffff;
                /* Warna teks untuk membedakan */
            }


            .pricing-thumb h3 {
                font-size: 22px;
                /* Ukuran judul event lebih besar */
            }

            .pricing-thumb p {
                font-size: 14px;
                /* Ukuran teks deskripsi */
            }

            /* Styling untuk scroll horizontal */
            #pricing-container {
                display: flex;
                flex-wrap: nowrap;
                /* Membuat elemen tetap berada di satu baris */
                overflow-x: auto;
                /* Menambahkan scroll horizontal */
                gap: 1px;
                /* Jarak antar kotak lebih kecil (dari 20px menjadi 10px) */
                padding: 20px;
            }

            .pricing-thumb {
                flex: 0 0 900px;
                /* Set lebar tetap lebih besar */
                max-width: 900px;
                /* Maksimal lebar kotak */
                margin: 0;
                /* Menghilangkan margin kanan untuk mengatur jarak */
                padding: 20px;
                /* Tambah padding agar konten lebih nyaman */
                background-color: #fff;
                /* Warna latar belakang kotak */
                border-radius: 8px;
                /* Sedikit rounded corners */
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                /* Sedikit bayangan */
            }

            .pricing-thumb p {
                max-height: 2.7em;
                /* Batasi tinggi deskripsi */
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                /* Jumlah baris yang ingin ditampilkan */
                -webkit-box-orient: vertical;
                margin-bottom: 10px;
                /* Spasi di bawah deskripsi */
            }

            /* Perbaikan ukuran lingkaran pada tombol */
            .pricing-thumb a svg.icon {
                width: 8px;
                /* Ukuran lingkaran lebih kecil */
                height: 8px;
                /* Sesuaikan dengan tinggi lingkaran */
            }

            /* Untuk membuat tombol "Buy Ticket" lebih kecil */
            .pricing-thumb a {
                font-size: 14px;
                /* Ukuran teks tombol lebih kecil */
            }
        </style>
    </head>

    <body>
        <main>
            @include('User.partials.headerUser')


            <section class="hero-section" id="section_1">
                <div class="section-overlay"></div>

                <div class="container d-flex justify-content-center align-items-center">
                    <div class="row">

                        <div class="col-12 mt-auto mb-5 text-center">
                            <small>Concertly Presents</small>

                            <h1 class="text-white mb-5">Night Live 2024</h1>

                            <a class="btn custom-btn smoothscroll"
                                href="{{ Auth::check() ? route('ticketpage') : route('showlogin') }}">
                                Beli Tiket
                            </a>

                        </div>

                        <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">



                        </div>
                    </div>
                </div>

                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="video/pexels-2022395.mp4" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>
            </section>


            <section class="about-section section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                            <div class="services-info">
                                <h2 class="text-white mb-4">Tentang Concertly</h2>

                                <p class="text-white">Concertly adalah platform terkemuka untuk membeli tiket konser
                                    secara online.
                                    Kami memberikan pengalaman yang nyaman dan aman untuk memastikan Anda tidak
                                    melewatkan momen
                                    spesial di setiap pertunjukan.</p>

                                <h6 class="text-white mt-4">Pengalaman Tak Terlupakan</h6>

                                <p class="text-white">Dengan Concertly, Anda bisa mendapatkan tiket dengan mudah dan
                                    cepat.
                                    Nikmati pengalaman festival musik terbaik dengan hanya beberapa klik.</p>

                                <h6 class="text-white mt-4">Bergabunglah Bersama Kami!</h6>

                                <p class="text-white">Ajak teman-teman Anda untuk bergabung dan nikmati setiap detik
                                    dari
                                    pertunjukan yang menakjubkan. Kami berkomitmen untuk memberikan layanan terbaik bagi
                                    penggemar musik!</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="about-text-wrap">
                                <img src="images/pexels-alexander-suhorucov-6457579.jpg" class="about-image img-fluid">

                                <div class="about-text-info d-flex">
                                    <div class="d-flex">
                                        <i class="about-text-icon bi-person"></i>
                                    </div>

                                    <div class="ms-4">
                                        <h3>Moment Bahagia</h3>
                                        <p class="mb-0">Rasakan pengalaman festival musik yang luar biasa bersama
                                            kami.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>



            <section class="artists-section section-padding" id="section_3">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-12 text-center">
                            <h2 class="mb-4">Temukan Artists</h1>
                        </div>

                        <div class="col-lg-5 col-12">
                            <div class="artists-thumb">
                                <div class="artists-image-wrap">
                                    <img src="images/artists/joecalih-UmTZqmMvQcw-unsplash.jpg"
                                        class="artists-image img-fluid">
                                </div>

                                <div class="artists-hover">
                                    <p>
                                        <strong>Name:</strong>
                                        Madona
                                    </p>

                                    <p>
                                        <strong>Birthdate:</strong>
                                        August 16, 1958
                                    </p>

                                    <p>
                                        <strong>Music:</strong>
                                        Pop, R&amp;B
                                    </p>

                                    <hr>

                                    <p class="mb-0">
                                        <strong>Youtube Channel:</strong>
                                        <a href="#">Madona Official</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12">
                            <div class="artists-thumb">
                                <div class="artists-image-wrap">
                                    <img src="images/artists/abstral-official-bdlMO9z5yco-unsplash.jpg"
                                        class="artists-image img-fluid">
                                </div>

                                <div class="artists-hover">
                                    <p>
                                        <strong>Name:</strong>
                                        Rihana
                                    </p>

                                    <p>
                                        <strong>Birthdate:</strong>
                                        Feb 20, 1988
                                    </p>

                                    <p>
                                        <strong>Music:</strong>
                                        Country
                                    </p>

                                    <hr>

                                    <p class="mb-0">
                                        <strong>Youtube Channel:</strong>
                                        <a href="#">Rihana Official</a>
                                    </p>
                                </div>
                            </div>

                            <div class="artists-thumb">
                                <img src="images/artists/soundtrap-rAT6FJ6wltE-unsplash.jpg"
                                    class="artists-image img-fluid">

                                <div class="artists-hover">
                                    <p>
                                        <strong>Name:</strong>
                                        Bruno Bros
                                    </p>

                                    <p>
                                        <strong>Birthdate:</strong>
                                        October 8, 1985
                                    </p>

                                    <p>
                                        <strong>Music:</strong>
                                        Pop
                                    </p>

                                    <hr>

                                    <p class="mb-0">
                                        <strong>Youtube Channel:</strong>
                                        <a href="#">Bruno Official</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="pricing-section section-padding section-bg" id="section_5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12 mx-auto">
                            <h2 class="text-center mb-4">Tiket Menanti, Siap Beraksi!</h2>
                        </div>

                        <div id="pricing-container" class="row">
                            <!-- Kotak tiket akan dimasukkan secara dinamis oleh AJAX -->
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
                            <h2 class="text-white mb-lg-0">Festava Live</h2>
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
        <script src="{{ asset('Styles/js/click-scroll.js') }}"></script>
        <script src="{{ asset('Styles/js/custom.js') }}"></script>



    </body>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('data_event_json') }}",
                method: 'GET',
                success: function(response) {
                    let pricingContainer = $('#pricing-container');
                    pricingContainer.empty(); // Kosongkan container sebelum mengisinya
                    response.data.forEach(function(event) {
                        // Format price dengan toLocaleString untuk menambahkan titik sebagai pemisah ribuan dan menghilangkan desimal
                        let formattedPrice = parseInt(event.price).toLocaleString('id-ID', {
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        });

                        let pricingHTML = `
    <div class="col-lg-4 col-12">
        <div class="pricing-thumb">
            <div class="d-flex">
                <div>
                    <h3><small>${event.event_name}</small></h3>
                    <p>${event.description}</p>
                </div>
                <p class="pricing-tag ms-auto">Event Date: <span>${event.event_date}</span></p>
            </div>
            <ul class="pricing-list mt-3">
                <li class="pricing-list-item">Location: ${event.venue}</li>
            </ul>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <span class="h4">Rp. ${formattedPrice}</span>
                <a class="link-fx-1 color-contrast-higher" href="{{ Auth::check() ? route('ticketpage') : route('showlogin') }}">
                    <span>Beli Tiket</span>
                    <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="16" cy="16" r="10"></circle>
                            <line x1="10" y1="18" x2="16" y2="12"></line>
                            <line x1="16" y1="12" x2="22" y2="18"></line>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
`;

                        pricingContainer.append(
                            pricingHTML); // Menambahkan event secara dinamis ke halaman
                    });
                }
            });
        });
    </script>

</html>
