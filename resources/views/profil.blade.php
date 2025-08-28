@extends('layouts.app')

@section('title', 'Profil Supermarket')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-md">
    
    <!-- 1. Logo + Nama -->
    <div class="flex items-center space-x-4 mb-6">
        <img src="{{ asset('logo.jpg') }}" alt="Logo Supermarket" class="w-20 h-20 rounded-full object-cover border-2 border-blue-500">
        <h1 class="text-2xl font-bold text-gray-800">Supermarket Sederhana</h1>
    </div>

    <!-- 2. Deskripsi Singkat -->
    <p class="text-lg text-gray-700 italic mb-6">"Supermarket lengkap untuk kebutuhan harian Anda."</p>

    <!-- 3. Info Utama -->
    <div class="mb-6 space-y-2 text-gray-700">
        <p>📍 <strong>Alamat:</strong> Jl. Contoh No. 123, Jakarta</p>
        <p>🕒 <strong>Jam Operasional:</strong> Senin - Sabtu: 08.00–20.00, Minggu: 09.00–17.00</p>
        <p>☎️ <strong>Kontak:</strong> (021) 1234 5678</p>
    </div>

    <!-- 4. Layanan Utama -->
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Layanan Utama</h2>
        <ul class="list-disc list-inside text-gray-700 space-y-1">
            <li>Belanja Online</li>
            <li>Layanan Antar</li>
            <li>Pembayaran Digital (QRIS, e-wallet)</li>
        </ul>
    </div>

    <!-- 5. Promo Aktif -->
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Promo Aktif</h2>
        <img src="{{ asset('promo.jpg') }}" alt="Banner Promo" class="rounded shadow-md">
        {{-- Ganti 'promo.jpg' dengan nama file promo di folder public --}}
    </div>

    <!-- 6. Tautan Sosial Media -->
    <div class="text-gray-700">
        <h2 class="text-lg font-semibold mb-2">Ikuti Kami</h2>
        <ul class="space-y-1">
            <li>🌐 Website: <a href="https://supermarketsederhana.com" class="text-blue-600 hover:underline" target="_blank">supermarketsederhana.com</a></li>
            <li>📘 Facebook: <a href="https://facebook.com/supermarketsederhana" class="text-blue-600 hover:underline" target="_blank">@supermarketsederhana</a></li>
            <li>📷 Instagram: <a href="https://instagram.com/supermarketsederhana" class="text-blue-600 hover:underline" target="_blank">@supermarketsederhana</a></li>
        </ul>
    </div>
</div>
@endsection
