@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Pengeluaran</h1>
        <form action="{{ route('pengeluaran.store') }}" method="POST">
            @csrf
            <div>
                <label for="nama">Nama Pengeluaran</label>
                <input type="text" name="nama" id="nama" required>
            </div>
            <div>
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" required>
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>
@endsection
