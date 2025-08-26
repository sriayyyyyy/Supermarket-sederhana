<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Supermarket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar (atas) -->
    <nav class="bg-gray-800 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <div class="flex items-center">
                    <h1 class="text-lg font-bold">Supermarket Admin</h1>
                </div>

                <!-- Info User -->
                <div class="flex items-center space-x-3">
                    <span class="hidden sm:block">Halo, Admin</span>
                    <form action="#" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar + Konten -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white shadow-md min-h-screen p-4">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('transaksi.create') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">Transaksi</a>
                </li>
                <li>
                    <a href="{{ route('produk.index') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">Produk</a>
                </li>
                <li>
                    <a href="{{ route('laporan.index') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">Laporan</a>
                </li>
                <li>
                    <a href="{{ route('pengaturan.index') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">Pengaturan</a>
                </li>
            </ul>
        </aside>

        <!-- Konten Dashboard -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-6">Dashboard Supermarket</h1>

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white shadow rounded-lg p-4">
                    <p class="text-gray-600">Saldo Kas</p>
                    <p class="text-xl font-bold">Rp 0</p>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <p class="text-gray-600">Pemasukan Hari Ini</p>
                    <p class="text-xl font-bold text-green-600">Rp 0</p>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <p class="text-gray-600">Pengeluaran Hari Ini</p>
                    <p class="text-xl font-bold text-red-600">Rp 0</p>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <p class="text-gray-600">Netto Bulan Ini</p>
                    <p class="text-xl font-bold">Rp 0</p>
                    <p class="text-xs text-gray-500">(Pemasukan: Rp 0, Pengeluaran: Rp 0)</p>
                </div>
            </div>

            <!-- Grafik -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Grafik 5 Hari Terakhir</h2>
                <canvas id="grafik5Hari"></canvas>
            </div>
        </main>
    </div>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafik5Hari').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["2025-08-21","2025-08-22","2025-08-23","2025-08-24","2025-08-25"],
                datasets: [
                    {
                        label: 'Pemasukan',
                        borderColor: 'green',
                        data: [0, 0, 0, 0, 0],
                        fill: false
                    },
                    {
                        label: 'Pengeluaran',
                        borderColor: 'red',
                        data: [0, 0, 0, 0, 0],
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
