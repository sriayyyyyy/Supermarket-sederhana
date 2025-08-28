@extends('layouts.app') {{-- Sesuaikan dengan layout kamu --}}

@section('title', 'Export Data')

@section('content')
<div class="container mt-4">
    <h1>Export Data ke Excel</h1>

    <form action="{{ route('export') }}" method="GET">
        <div class="mb-3">
            <label for="dari" class="form-label">Dari Tanggal:</label>
            <input type="date" id="dari" name="dari" class="form-control" required value="{{ request('dari') }}">
        </div>

        <div class="mb-3">
            <label for="sampai" class="form-label">Sampai Tanggal:</label>
            <input type="date" id="sampai" name="sampai" class="form-control" required value="{{ request('sampai') }}">
        </div>

        <button type="submit" class="btn btn-success">📤 Export ke Excel</button>
        <a href="{{ route('pengaturan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
