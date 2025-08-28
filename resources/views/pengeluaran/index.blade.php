@extends('layouts.app')

@section('title', 'Pengeluaran')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Daftar Pengeluaran</h1>

    <a href="{{ route('pengeluaran.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ Tambah Pengeluaran</a>

    <table class="w-full mt-6 bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2">Tanggal</th>
                <th class="p-2">Nama</th>
                <th class="p-2">Jumlah</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengeluarans as $item)
                <tr class="border-b">
                    <td class="p-2">{{ $item->tanggal }}</td>
                    <td class="p-2">{{ $item->nama }}</td>
                    <td class="p-2">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    <td class="p-2">
                        <a href="{{ route('pengeluaran.edit', $item->id) }}" class="text-blue-600">Edit</a> | 
                        <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="p-2 text-center">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
