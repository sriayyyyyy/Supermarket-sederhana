@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="margin-bottom: 15px;">📊 Daftar Pemasukan</h2>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px; font-weight:bold;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pemasukan.create') }}" 
       style="display:inline-block; margin-bottom:15px; padding:8px 15px; background:#28a745; color:white; text-decoration:none; border-radius:6px;">
        + Tambah Pemasukan
    </a>

    <table class="styled-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($pemasukan as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>
                    <a href="{{ route('pemasukan.edit', $item->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('pemasukan.destroy', $item->id) }}" 
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
                <td colspan="5">Belum ada data pemasukan</td>
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

    /* Header tabel hitam/abu-abu */
    .styled-table thead tr {
        background-color: #333333; /* Hitam (#000000) atau ganti ke abu-abu: #555555 */
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

    /* Tombol edit */
    .btn-edit {
        display: inline-block;
        padding: 6px 12px;
        background: #007bff; /* biru */
        color: white;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
    }
    .btn-edit:hover {
        background: #0056b3;
    }

    /* Tombol hapus */
    .btn-delete {
        display: inline-block;
        padding: 6px 12px;
        background: #dc3545; /* merah */
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
