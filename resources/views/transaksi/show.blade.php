@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-6">
    <h1 class="text-xl font-bold mb-4">Detail Transaksi</h1>

    <div class="space-y-3">
        <div><strong>Nama Produk:</strong> {{ $transaksi->produk->nama }}</div>
        <div><strong>Jumlah:</strong> {{ $transaksi->jumlah }}</div>
        <div><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</div>
        <div><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d-m-Y H:i') }}</div>
    </div>

    <div class="mt-6">
        <a href="{{ url('/transaksi') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kembali</a>
    </div>
</div>
@endsection
