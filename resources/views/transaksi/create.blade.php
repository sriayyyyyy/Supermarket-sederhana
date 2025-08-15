<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Form Transaksi Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Transaksi Penjualan</h4>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="produk_id" class="form-label">Nama Produk:</label>
                    <select 
                        name="produk_id" 
                        id="produk_id" 
                        class="form-control" 
                        required
                    >
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id }}" {{ old('produk_id') == $produk->id ? 'selected' : '' }}>
                                {{ $produk->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('produk_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Beli:</label>
                    <input 
                        type="number" 
                        name="jumlah" 
                        id="jumlah" 
                        class="form-control" 
                        min="1" 
                        value="{{ old('jumlah', 1) }}" 
                        required
                    >
                    @error('jumlah')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">💾 Simpan Transaksi</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
