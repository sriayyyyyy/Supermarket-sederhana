@extends('layouts.app')

@section('title', 'Dashboard Supermarket')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Dashboard Supermarket</h1>

    <!-- Ringkasan -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-gray-500">Saldo Kas</h2>
            <p class="text-2xl font-bold text-green-600">Rp {{ number_format(5000000, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-gray-500">Pemasukan Hari Ini</h2>
            <p class="text-2xl font-bold text-blue-600">Rp {{ number_format(750000, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-gray-500">Pengeluaran Hari Ini</h2>
            <p class="text-2xl font-bold text-red-600">Rp {{ number_format(300000, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-gray-500">Laba Bulan Ini</h2>
            <p class="text-2xl font-bold text-purple-600">Rp {{ number_format(4500000, 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Grafik -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-bold mb-4">Grafik Pemasukan & Pengeluaran</h2>
        <canvas id="keuanganChart" height="100"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('keuanganChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
                datasets: [
                    {
                        label: 'Pemasukan',
                        data: [1200000, 1500000, 1400000, 1700000, 1600000, 1800000, 2000000],
                        borderColor: 'rgb(59, 130, 246)',
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Pengeluaran',
                        data: [800000, 900000, 1000000, 1100000, 950000, 1050000, 1150000],
                        borderColor: 'rgb(239, 68, 68)',
                        fill: false,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' }
                }
            }
        });
    </script>
@endsection
