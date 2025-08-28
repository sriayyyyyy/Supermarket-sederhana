@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📋 Daftar Transaksi</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table border="1" width="100%" cellpadding="5">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Kasir</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->produk->nama_produk }}</td>
                    <td>{{ $t->jumlah }}</td>
                    <td>Rp {{ number_format($t->total) }}</td>
                    <td>{{ $t->tanggal }}</td>
                    <td>{{ $t->kasir }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $transaksi->links() }}
</div>
@endsection
