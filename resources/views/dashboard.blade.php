<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Supermarket</title>
    <!-- Tailwind via CDN (opsional, untuk styling cepat) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4 mb-6">
        <div class="max-w-6xl mx-auto flex justify-between">
            <div class="font-bold text-lg">Supermarket</div>
            <div>
                <a href="#" class="text-blue-500 hover:underline">Dashboard</a>
                <a href="#" class="ml-4 text-blue-500 hover:underline">Transaksi</a>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto p-6 space-y-6">
        <h1 class="text-2xl font-bold">Dashboard Supermarket</h1>

        <!-- Cards Ringkasan -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-2xl shadow p-4">
                <div class="text-sm text-gray-500">Saldo Kas</div>
                <div class="text-2xl font-semibold">Rp {{ number_format($saldo, 0, ',', '.') }}</div>
            </div>
            <div class="bg-white rounded-2xl shadow p-4">
                <div class="text-sm text-gray-500">Pemasukan Hari Ini</div>
                <div class="text-2xl font-semibold text-emerald-600">Rp {{ number_format($pemasukanHariIni, 0, ',', '.') }}</div>
            </div>
            <div class="bg-white rounded-2xl shadow p-4">
                <div class="text-sm text-gray-500">Pengeluaran Hari Ini</div>
                <div class="text-2xl font-semibold text-rose-600">Rp {{ number_format($pengeluaranHariIni, 0, ',', '.') }}</div>
            </div>
            <div class="bg-white rounded-2xl shadow p-4">
                <div class="text-sm text-gray-500">Netto Bulan Ini</div>
                <div class="text-2xl font-semibold">
                    Rp {{ number_format(($pemasukanBulanIni - $pengeluaranBulanIni), 0, ',', '.') }}
                </div>
                <div class="text-xs text-gray-500">(Pemasukan: Rp {{ number_format($pemasukanBulanIni,0,',','.') }}, Pengeluaran: Rp {{ number_format($pengeluaranBulanIni,0,',','.') }})</div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Grafik 5 Hari Terakhir</h2>
            <canvas id="cashFlowChart" height="120"></canvas>
        </div>
    </div>

    <script>
        const labels = @json($labels);
        const income = @json($incomeSeries);
        const expense = @json($expenseSeries);

        const ctx = document.getElementById('cashFlowChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels,
                datasets: [
                    {
                        label: 'Pemasukan',
                        data: income,
                        tension: 0.3,
                        borderWidth: 2,
                    },
                    {
                        label: 'Pengeluaran',
                        data: expense,
                        tension: 0.3,
                        borderWidth: 2,
                    },
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
