@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 mt-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-blue-600 px-6 py-4 text-white">
            <h2 class="text-lg font-semibold">📋 Daftar Transaksi</h2>
        </div>

        <div class="p-6">
            {{-- Alert success jika ada --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tabel Transaksi --}}
            <div class="overflow-x-auto">
                <table class="table-auto w-full border border-gray-300 mt-4 bg-white text-sm">
                    <thead class="bg-gray-200 text-left">
                        <tr>
                            <th class="px-4 py-2 border">Nama Produk</th>
                            <th class="px-4 py-2 border">Jumlah</th>
                            <th class="px-4 py-2 border">Total Harga</th>
                            <th class="px-4 py-2 border">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksis as $transaksi)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">{{ $transaksi->produk->nama ?? 'Produk Dihapus' }}</td>
                                <td class="px-4 py-2 border">{{ $transaksi->jumlah }}</td>
                                <td class="px-4 py-2 border">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                                <td class="px-4 py-2 border">{{ $transaksi->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center px-4 py-2">Belum ada transaksi</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-100">
                            <td colspan="2" class="text-end px-4 py-2 border font-bold">Total Keseluruhan</td>
                            <td colspan="2" class="px-4 py-2 border font-bold">Rp {{ number_format($totalKeseluruhan ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
