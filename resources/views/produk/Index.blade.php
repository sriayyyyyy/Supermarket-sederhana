@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="margin-bottom: 15px;">📦 Daftar Produk</h2>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px; font-weight:bold;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('produk.create') }}" 
       style="display:inline-block; margin-bottom:15px; padding:8px 15px; background:#28a745; color:white; text-decoration:none; border-radius:6px;">
        + Tambah Produk
    </a>

    <table class="styled-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($produk as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    <a href="{{ route('produk.edit', $item->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('produk.destroy', $item->id) }}" 
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Yakin mau hapus?')" 
                                class="btn-delete">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada data produk</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

{{-- CSS --}}
<style>
    .styled-table {
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        width: 100%;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .styled-table thead tr {
        background-color: #333333;
        color: #ffffff;
        text-align: center;
    }

    .styled-table th, .styled-table td {
        border: 1px solid #dddddd;
        padding: 12px 15px;
        text-align: center;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .btn-edit {
        display: inline-block;
        padding: 6px 12px;
        background: #007bff;
        color: white;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
    }
    .btn-edit:hover {
        background: #0056b3;
    }

    .btn-delete {
        display: inline-block;
        padding: 6px 12px;
        background: #dc3545;
        color: white;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }
    .btn-delete:hover {
        background: #a71d2a;
    }
</style>
@endsection
