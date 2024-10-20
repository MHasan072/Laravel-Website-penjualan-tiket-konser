<!DOCTYPE html>
<html lang="en">
    @include('Admin.partials.headerAdmin')

    <body>
        <div class="container-scroller">
            @include('Admin.partials.sidebarAdmin')

            <div class="container-fluid page-body-wrapper">
                @include('Admin.partials.navbarAdmin')

                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bukti Pembayaran</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Kode Pembelian: {{ $purchase->purchase_code }}</h5>
                                        <h5>Status Pembayaran:
                                            {{ $purchase->payment_status == 1 ? 'Sudah Bayar' : 'Belum Bayar' }}</h5>
                                        <hr>
                                        <h5>Gambar Bukti Pembayaran:</h5>
                                        @if ($purchase->payment_proof)
                                            <img src="{{ asset('uploads/' . $purchase->payment_proof) }}"
                                                alt="Bukti Pembayaran" width="300">
                                        @else
                                            <p>Tidak ada bukti pembayaran yang diunggah.</p>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('detailPembelian') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                @include('Admin.partials.footerAdmin')
            </div>
        </div>
    </body>

</html>
