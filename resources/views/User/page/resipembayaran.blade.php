<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resi Pembelian Tiket</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }

            .receipt {
                border: 1px solid #ddd;
                padding: 20px;
                max-width: 600px;
                margin: auto;
            }

            h1 {
                text-align: center;
            }

            table {
                width: 100%;
                margin-top: 20px;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 10px;
                text-align: left;
            }

            .total {
                font-weight: bold;
            }

            .logo {
                display: block;
                margin: 0 auto 20px;
                /* Center the logo */
                max-width: 150px;
                /* Adjust the size as needed */
            }
        </style>
    </head>

    <body>

        <div class="receipt">
            <img src="{{ asset('images/logoconcertly-rounded.png') }}" alt="Logo" class="logo">
            <!-- Logo added here -->
            <h1>Resi Pembelian Tiket</h1>
            <p>Nama: {{ $purchase->tiket_nama }}</p>
            <p>Email: {{ $purchase->tiket_email }}</p>
            <p>Kode Pembelian: <strong>{{ $purchase->purchase_code }}</strong></p>


            <table>
                <tr>
                    <th>Event</th>
                    <td>{{ $purchase->event->event_name }}</td>
                </tr>
                <tr>
                    <th>Harga Tiket</th>
                    <td>Rp {{ number_format($purchase->total_price, 0, ',', '.') }}</td>
                </tr>
            </table>

            <p class="total">Total: Rp {{ number_format($purchase->total_price, 0, ',', '.') }}</p>

            <p>Terima kasih atas pembelian tiket Anda!</p>
            <p>Kami akan segera mengirimkan tiket ke email anda setelah verifikasi bukti pembayaran.</p>
            <button onclick="window.print()">Download Resi</button>

        </div>

    </body>

</html>
