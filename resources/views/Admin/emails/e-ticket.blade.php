<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="{{ asset('images/logoconcertly-rounded.png') }}">
        <style>
            body {
                background-color: #f0f0f0;
                font-family: Arial, sans-serif;
                color: #333;
                margin: 0;
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .ticket-container {
                background-color: #ffffff;
                width: 400px;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            .logo-text {
                font-size: 2rem;
                font-weight: bold;
                margin-bottom: 15px;
            }

            h1 {
                font-size: 1.5rem;
                margin: 10px 0;
            }

            p {
                margin: 5px 0;
            }

            .buyer-name {
                font-size: 1.2rem;
                font-weight: bold;
                margin-top: 10px;
            }

            .ticket-number {
                font-size: 1rem;
                margin-top: 10px;
            }

            .qr-code {
                margin-top: 20px;
            }
        </style>
    </head>

    <body>
        <div class="ticket-container">
            <!-- Mengganti logo dengan tulisan Concertly -->
            <div class="logo-text">Concertly</div>

            <!-- Menampilkan nama pembeli -->
            <p class="buyer-name">Nama: {{ $purchase->tiket_nama }}</p>
            <p class="buyer-name">Email: {{ $purchase->tiket_email }}</p>

            <h1>{{ $purchase->event->event_name }}</h1>
            <p>Lokasi: {{ $purchase->event->venue }}</p>
            <p>Tanggal: {{ $purchase->event->event_date }}</p>
            <p class="ticket-number">Nomor: {{ $purchase->purchase_code }}</p>

            <div class="qr-code">
                <div class="visible-print text-center">
                    {!! trim(
                        preg_replace(
                            '/<\?xml.*?\?>/',
                            '',
                            QrCode::size(100)->generate(route('showReceipt', ['id' => $purchase->id_purchases])),
                        ),
                    ) !!}
                    <p>Scan me to view your ticket receipt.</p>
                </div>
            </div>
        </div>
    </body>

</html>
