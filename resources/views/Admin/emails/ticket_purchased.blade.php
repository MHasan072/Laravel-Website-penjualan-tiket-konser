<h1>Concertly</h1>
<p>Halo {{ $purchase->tiket_nama }},</p>
<p>Terima kasih telah membeli tiket untuk event: {{ $purchase->event->event_name }}.</p>
<p>Berikut detail pemesanan Anda:</p>
<ul>
    <li>Kode Pembelian: {{ $purchase->purchase_code }}</li>
    <li>Nama Event: {{ $purchase->event->event_name }}</li>
    <li>Harga: Rp {{ number_format($purchase->total_price, 0, ',', '.') }}</li>
    <li>Tanggal Event: {{ $purchase->event->event_date }}</li>
    <li>Lokasi: {{ $purchase->event->venue }}</li>
</ul>
