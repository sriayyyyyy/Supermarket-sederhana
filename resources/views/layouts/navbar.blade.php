<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Supermarket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Font Awesome -->
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

                <!-- Info User dengan Dropdown -->
                <div class="flex items-center space-x-3" x-data="{ open: false }">
                    <span class="hidden sm:block flex items-center gap-1">
                        Halo, Admin
                        <i class="fas fa-user-circle text-white text-lg"></i>
                    </span>
                    
                    <div class="relative">
                        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
                             @click="open = !open"
                             class="w-8 h-8 rounded-full cursor-pointer border-2 border-white" 
                             alt="User Icon">
                        
                        <!-- Dropdown -->
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition 
                             class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg z-50 text-black text-sm">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">Lihat Profil</a>
                            <form action="#" method="POST" class="border-t border-gray-200">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600">Logout</button>
                            </form>
                        </div>
                    </div>
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
