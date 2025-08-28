@extends('layouts.app')

@section('title', 'Laporan Transaksi')

@section('content')
    <div class="bg-white p-6 rounded shadow-md">
        <h2 class="text-xl font-bold mb-4">Laporan Transaksi Kasir</h2>

        <!-- Filter tanggal -->
        <form method="GET" action="{{ route('laporan.index') }}" class="flex flex-col md:flex-row items-start md:items-center gap-4 mb-6">
            <div>
                <label class="block text-sm font-semibold">Dari Tanggal</label>
                <input type="date" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}" class="border rounded px-3 py-2 w-full">
            </div>

            <div>
                <label class="block text-sm font-semibold">Sampai Tanggal</label>
                <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}" class="border rounded px-3 py-2 w-full">
            </div>

            <div class="flex gap-2 mt-6 md:mt-0">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
                <a href="{{ route('laporan.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Reset</a>
            </div>
        </form>

        <!-- Export buttons -->
        <div class="mb-4 flex gap-3">
            <a href="{{ route('laporan.export', request()->all()) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Export PDF</a>
            {{-- Tambah export Excel jika dibutuhkan --}}
        </div>

        <!-- Tabel laporan -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-100 rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="text-left py-3 px-4">Tanggal</th>
                        <th class="text-left py-3 px-4">Produk</th>
                        <th class="text-left py-3 px-4">Jumlah</th>
                        <th class="text-left py-3 px-4">Harga Satuan</th>
                        <th class="text-left py-3 px-4">Total Harga</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($transaksis as $transaksi)
                        <tr class="border-t">
                        <td class="py-2 px-4">{{ $transaksi->created_at->format('Y-m-d') }}</td>
                            <td class="py-2 px-4">{{ $transaksi->produk->nama }}</td>
                            <td class="py-2 px-4">{{ $transaksi->jumlah }}</td>
                            <td class="py-2 px-4">Rp {{ number_format($transaksi->produk->harga, 0, ',', '.') }}</td>
                            <td class="py-2 px-4">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Total keseluruhan -->
        <div class="mt-4 font-bold text-lg">
            Total Keseluruhan: Rp {{ number_format($totalKeseluruhan, 0, ',', '.') }}
        </div>
    </div>
@endsection
