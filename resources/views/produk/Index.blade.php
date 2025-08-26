@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-xl font-bold mb-6">📦 Daftar Produk</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">#</th>
                    <th class="px-4 py-2 text-left">Nama Produk</th>
                    <th class="px-4 py-2 text-center">Stok</th>
                    <th class="px-4 py-2 text-center">Harga</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produks as $index => $produk)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 font-medium">{{ $produk->nama }}</td>
                        <td class="px-4 py-2 text-center">{{ $produk->stok }}</td>
                        <td class="px-4 py-2 text-center">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('produk.edit', $produk->id) }}" class="px-3 py-1 rounded bg-yellow-400 hover:bg-yellow-500 text-white text-sm">Edit</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 rounded bg-red-500 hover:bg-red-600 text-white text-sm" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">Belum ada produk</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
