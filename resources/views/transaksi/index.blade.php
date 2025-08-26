@extends('layouts.app')

@section('title', 'Data Transaksi')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Data Transaksi</h2>
        <a href="{{ route('transaksi.create') }}" 
           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
           + Tambah Transaksi
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">#</th>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Jumlah</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Total Harga</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $t)
            <tr>
                <td class="border p-2">{{ $loop->iteration }}</td>
                <td class="border p-2">{{ $t->produk->nama_produk }}</td>
                <td class="border p-2">{{ $t->jumlah }}</td>
                <td class="border p-2">{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }}</td>
                <td class="border p-2">Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>
                <td class="border p-2 text-center">
                    <a href="{{ route('transaksi.edit', $t->id) }}" 
                       class="px-2 py-1 bg-yellow-400 text-white rounded">Edit</a>
                    <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" class="inline-block"
                          onsubmit="return confirm('Yakin hapus transaksi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="border p-2 text-center">Belum ada transaksi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection