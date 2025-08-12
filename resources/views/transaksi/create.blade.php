<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Transaksi Penjualan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="produk_id" class="form-label">Pilih Produk:</label>
                    <select name="produk_id" id="produk_id" class="form-select" required>
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id }}">{{ $produk->nama }} (Stok: {{ $produk->stok }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Beli:</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" value="1" required>
                </div>

                <button type="submit" class="btn btn-success">💾 Simpan Transaksi</button>
            </form>
        </div>
    </div>
</div>
