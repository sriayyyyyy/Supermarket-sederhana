@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Daftar Pemasukan</h4>
    <a href="{{ route('pemasukan.create') }}" class="btn btn-primary mb-3">+ Tambah Pemasukan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemasukan as $p)
            <tr>
                <td>{{ $p->keterangan }}</td>
                <td>Rp {{ number_format($p->jumlah,0,',','.') }}</td>
                <td>{{ $p->tanggal }}</td>
                <td>
                    <a href="{{ route('pemasukan.edit',$p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pemasukan.destroy',$p->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pemasukan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
