@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pemasukan</h2>

    <form action="{{ route('pemasukan.store') }}" method="POST">
        @csrf
        <div>
            <label>Keterangan:</label>
            <input type="text" name="keterangan" value="{{ old('keterangan') }}" required>
        </div>
        <div>
            <label>Jumlah:</label>
            <input type="number" name="jumlah" value="{{ old('jumlah') }}" required>
        </div>
        <div>
            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="{{ old('tanggal') }}" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
