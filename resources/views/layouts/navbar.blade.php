<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Supermarket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <h1 class="text-lg font-bold">Supermarket Admin</h1>
            </div>

            <!-- Menu Navigasi -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('dashboard') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Dashboard</a>
                <a href="{{ route('produk.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Produk</a>
                <a href="{{ route('transaksi.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Transaksi</a>
                <a href="{{ route('laporan.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Laporan</a>
                <a href="{{ route('pengaturan.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Pengaturan</a>
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

    
        <!-- Konten -->
    <div class="p-6">
        <h1 class="text-2xl font-bold">Selamat Datang di Dashboard Admin</h1>
        <p class="text-gray-600">Kelola data supermarket Anda di sini.</p>
    </div>

</body>
</html>
