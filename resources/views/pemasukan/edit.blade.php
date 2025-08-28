@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pemasukan</h2>

    <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Keterangan:</label>
            <input type="text" name="keterangan" value="{{ old('keterangan', $pemasukan->keterangan) }}" required>
        </div>
        <div>
            <label>Jumlah:</label>
            <input type="number" name="jumlah" value="{{ old('jumlah', $pemasukan->jumlah) }}" required>
        </div>
        <div>
            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $pemasukan->tanggal) }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
</div>
@endsection
