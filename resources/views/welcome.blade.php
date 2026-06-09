<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMA NAMIRA</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('css/siswa.css') }}">

    <style>
        .sidebar {
            @apply w-72 min-h-screen bg-gradient-to-b from-indigo-900 via-blue-900 to-slate-900 text-white p-6;
        }

        .menu-item {
            @apply block px-4 py-3 rounded-xl transition hover:bg-white/10;
        }

        .menu-active {
            @apply bg-white/20 font-semibold;
        }
    </style>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <!-- HEADER -->
        <div class="mb-10">
            <div class="bg-white/10 p-5 rounded-2xl backdrop-blur border border-white/10">
                <h2 class="text-lg font-bold">🎓 SMA NAMIRA</h2>
                <p class="text-sm text-gray-300 mt-1">
                    Sistem Manajemen Sekolah
                </p>
            </div>
        </div>

        <!-- MENU -->
        <nav class="space-y-2">

            <a href="{{ url('/') }}" class="menu-item menu-active">🏠 Beranda</a>
            <a href="{{ url('/siswa') }}" class="menu-item">👨‍🎓 Data Siswa</a>
            <a href="{{ url('/guru') }}" class="menu-item">👨‍🏫 Data Guru</a>
            <a href="{{ url('/mapel') }}" class="menu-item">📚 Mata Pelajaran</a>

        </nav>

        <!-- ADMIN BOX -->
        <div class="mt-10 bg-white/10 p-4 rounded-2xl border border-white/10">
            <p class="text-sm text-gray-300">Login sebagai</p>
            <h3 class="font-bold text-lg">Admin</h3>
            <p class="text-xs text-gray-300">{{ session('admin', 'Admin') }}</p>

            <a href="{{ url('/logout') }}">
                <button class="w-full mt-4 bg-red-500 hover:bg-red-600 py-2 rounded-xl transition">
                    Logout
                </button>
            </a>
        </div>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-8">

        <!-- HEADER -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Dashboard
            </h1>
            <p class="text-gray-500">
                Selamat datang di Sistem Informasi SMA NAMIRA
            </p>
        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <p class="text-gray-500">Total Siswa</p>
                <h2 class="text-3xl font-bold text-blue-600">
                    {{ $totalSiswa ?? 0 }}
                </h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <p class="text-gray-500">Total Guru</p>
                <h2 class="text-3xl font-bold text-green-600">
                    {{ $totalGuru ?? 0 }}
                </h2>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <p class="text-gray-500">Mata Pelajaran</p>
                <h2 class="text-3xl font-bold text-purple-600">
                    {{ $totalMapel ?? 0 }}
                </h2>
            </div>

        </div>

        <!-- ACTIVITY -->
        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold mb-5">
                Aktivitas Terbaru
            </h2>

            <table class="w-full text-sm">

                <thead class="text-gray-500 border-b">
                    <tr>
                        <th class="text-left py-3">Waktu</th>
                        <th class="text-left py-3">Aktivitas</th>
                        <th class="text-left py-3">Detail</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($aktivitas as $item)
                    <tr class="border-b hover:bg-gray-50">

                        <td class="py-3 text-gray-600">
                            {{ optional($item['created_at'] ?? null)->format('d M Y H:i') ?? '-' }}
                        </td>

                        <td class="py-3 font-semibold
                            {{ $item['type']=='siswa' ? 'text-blue-600' :
                               ($item['type']=='guru' ? 'text-green-600' : 'text-purple-600') }}
                        ">
                            {{ ucfirst($item['type'] ?? '-') }}
                        </td>

                        <td class="py-3 text-gray-700">
                            {{ $item['nama'] ?? '-' }} berhasil ditambahkan
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-6 text-center text-gray-400">
                            Belum ada aktivitas
                        </td>
                    </tr>
                @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

</body>
</html>