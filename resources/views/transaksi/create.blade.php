@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-md max-w-lg mx-auto">
    <h2 class="text-xl font-bold mb-6">Tambah Transaksi</h2>

    <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Input Nama Produk --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
            <input type="text" name="nama_produk" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" placeholder="Ketik nama produk">
        </div>

        {{-- Input Jumlah --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
            <input type="number" name="jumlah" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" value="1" min="1">
        </div>

        {{-- Input Tanggal --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Transaksi</label>
            <input type="date" name="tanggal" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" value="{{ date('Y-m-d') }}">
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end space-x-2 pt-4">
            <a href="{{ route('transaksi.index') }}" class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800">Batal</a>
            <button type="submit" class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">Simpan</button>
        </div>
    </form>
</div>
@endsection
