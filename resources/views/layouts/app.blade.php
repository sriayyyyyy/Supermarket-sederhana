<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Supermarket Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-800 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">

                <!-- Logo + Nama -->
                <div class="flex items-center space-x-3">
                <img src="{{ asset('logo.jpg') }}" alt="Logo Supermarket" class="h-12 w-12 rounded-full object-cover">
                    <h1 class="text-lg font-bold">Supermarket Sederhana</h1>
                </div>

                <!-- Info User -->
                <div class="flex items-center space-x-3">
                    <span class="hidden sm:block">Halo, Admin</span>
                </div>

            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white shadow-md min-h-screen p-4 flex flex-col">

            <div class="p-2 text-xl font-bold text-blue-400">
                🛒 Supermarket
            </div>
            
            {{-- Menu utama --}}
            <ul class="space-y-2 flex-1 mt-4">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700 font-bold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0-8H5a2 2 0 00-2 2v7h6m2-9h6a2 2 0 012 2v7h-6v-7z" />
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaksi.create') ?? url('/transaksi') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('transaksi.*') ? 'bg-gray-700 font-bold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h18M9 8h6m-3 4h.01M4 21h16c1.104 0 2-.896 2-2V7c0-1.104-.896-2-2-2H4c-1.104 0-2 .896-2 2v12c0 1.104.896 2 2 2z" />
                        </svg>
                        <span class="ml-3">Kasir</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk.index') ?? url('/produk') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('produk.*') ? 'bg-gray-700 font-bold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M20 13V6a2 2 0 00-2-2h-3V2H9v2H6a2 2 0 00-2 2v7m16 0H4m16 0l-1.34 5.34a2 2 0 01-1.96 1.66H7.3a2 2 0 01-1.96-1.66L4 13" />
                        </svg>
                        <span class="ml-3">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengeluaran.index') ?? url('/pengeluaran') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('pengeluaran.*') ? 'bg-gray-700 font-bold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 8v8m-4-4h8m8 4a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-3">Pengeluaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pemasukan.index') ?? url('/pemasukan') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('pemasukan.*') ? 'bg-gray-700 font-bold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="ml-3">Pemasukan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporan.index') ?? url('/laporan') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('laporan.*') ? 'bg-gray-700 font-bold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M9 17v-6h13v6M9 12V6h13v6M9 6V4H7v2h2z" />
                        </svg>
                        <span class="ml-3">Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengaturan.index') ?? url('/pengaturan') }}" class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('pengaturan.*') ? 'bg-gray-700 font-bold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 8c-2.21 0-4 .79-4 2s1.79 2 4 2 4-.79 4-2-1.79-2-4-2zm0 6c-2.21 0-4 .79-4 2s1.79 2 4 2 4-.79 4-2-1.79-2-4-2z" />
                        </svg>
                        <span class="ml-3">Pengaturan</span>
                    </a>
                </li>
            </ul>

            {{-- Logout di paling bawah --}}
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit"
                        class="w-full text-left flex items-center px-4 py-2 rounded bg-red-600 hover:bg-red-700 font-bold">
                    🚪 Logout
                </button>
            </form>
        </aside>

        <!-- Konten -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
