@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3 text-primary">🛒 Tambah Transaksi</h4>

    <div class="card shadow-lg border-0" style="background: #f8f9fa;">
        <div class="card-body">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <table class="table table-borderless align-middle">
                    <tr>
                        <td style="width: 150px; font-weight: bold;">Produk</td>
                        <td class="ps-3">
                            <select name="produk_id" id="produk" class="form-select" required>
                                <option value="">-- Pilih Produk --</option>
                                @forelse($produk as $item)
                                    <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">
                                        {{ $item->nama_produk }} (Stok: {{ $item->stok }})
                                    </option>
                                @empty
                                    <option value="" disabled>Belum ada produk</option>
                                @endforelse
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Jumlah</td>
                        <td class="ps-3">
                            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Tanggal</td>
                        <td class="ps-3">
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </td>
                    </tr>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">
                        💾 Simpan
                    </button>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-danger">
                        ❌ Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
