@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    {{-- Ringkasan --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-green-100 p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Saldo Kas</h2>
            <p class="text-2xl font-bold text-green-700">Rp 10.000.000</p>
        </div>
        <div class="bg-blue-100 p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Pemasukan Hari Ini</h2>
            <p class="text-2xl font-bold text-blue-700">Rp 500.000</p>
        </div>
        <div class="bg-blue-200 p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Pemasukan Bulan Ini</h2>
            <p class="text-2xl font-bold text-blue-800">Rp 15.000.000</p>
        </div>
        <div class="bg-red-100 p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Pengeluaran Hari Ini</h2>
            <p class="text-2xl font-bold text-red-700">Rp 200.000</p>
        </div>
    </div>

    {{-- Grafik --}}
    <div class="bg-gray-50 p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Grafik Pemasukan & Pengeluaran</h2>
        <canvas id="financeChart" height="100"></canvas>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('financeChart').getContext('2d');
    const financeChart = new Chart(ctx, {
        type: 'bar', // kalau mau garis ganti jadi 'line'
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [
                {
                    label: 'Pemasukan',
                    data: [1200000, 1500000, 1000000, 2000000, 1800000, 2200000],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Pengeluaran',
                    data: [500000, 700000, 800000, 1200000, 1000000, 900000],
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endpush