@extends('layouts.app')

@section('title', 'Laporan Transaksi')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Laporan Transaksi</h2>

    <table class="table-auto w-full border-collapse border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Produk</th>
                <th class="border px-4 py-2">Jumlah</th>
                <th class="border px-4 py-2">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td class="border px-4 py-2">{{ $transaksi->produk->nama }}</td>
                    <td class="border px-4 py-2">{{ $transaksi->jumlah }}</td>
                    <td class="border px-4 py-2">Rp {{ number_format($transaksi->total_harga) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="mt-4 font-bold">Total Keseluruhan: Rp {{ number_format($totalKeseluruhan) }}</p>
</div>
@endsection