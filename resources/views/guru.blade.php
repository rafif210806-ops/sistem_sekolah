<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSS CUSTOM -->
    <link rel="stylesheet" href="{{ asset('css/siswa.css') }}">

</head>

<body>

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <!-- LOGO -->
        <div class="mb-10">

            <h1 class="text-3xl font-bold">
                SISTEM SMA
            </h1>

            <p class="text-gray-300 mt-1">
                Manajemen Data Sekolah
            </p>

        </div>

        <!-- MENU -->
        <ul class="space-y-4">

            <li>
                <a href="/" class="menu-item">
                    🏠 Beranda
                </a>
            </li>

            <li>
                <a href="/siswa" class="menu-item">
                    👨‍🎓 Data Siswa
                </a>
            </li>

            <li>
                <a href="/guru" class="menu-item menu-active">
                    👨‍🏫 Data Guru
                </a>
            </li>

            <li>
                <a href="/mapel" class="menu-item">
                    📚 Data Mapel
                </a>
            </li>

        </ul>

        <!-- ADMIN -->
        <div class="mt-20 bg-white/10 p-4 rounded-2xl">

            <h2 class="font-bold text-lg">
                Admin
            </h2>

            <p class="text-gray-300 text-sm mb-4">
                {{ session('admin') }}
            </p>

            <a href="/logout">

                <button class="btn-delete w-full">
                    Logout
                </button>

            </a>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-10">

        <!-- HEADER -->
        <div class="mb-8">

            <h1 class="text-4xl font-bold text-gray-800">
                Data Guru
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola data guru SMA
            </p>

        </div>

        <!-- FORM -->
        <div class="card">

            <h2 class="text-2xl font-bold mb-6">
                {{ isset($edit) ? 'Edit Data Guru' : 'Form Input Guru' }}
            </h2>

            <form action="{{ isset($edit) ? '/guru/update/'.$edit->id : '/guru' }}"
                  method="POST">

                @csrf

                <div class="grid grid-cols-2 gap-6">

                    <!-- NAMA -->
                    <div>

                        <label class="block mb-2 font-semibold">
                            Nama Guru
                        </label>

                        <input type="text"
                               name="nama"
                               value="{{ $edit->nama ?? '' }}"
                               class="input"
                               placeholder="Masukkan nama guru"
                               required>

                    </div>

                    <!-- MAPEL -->
                    <div>

                        <label class="block mb-2 font-semibold">
                            Mata Pelajaran
                        </label>

                        <input type="text"
                               name="mapel"
                               value="{{ $edit->mapel ?? '' }}"
                               class="input"
                               placeholder="Contoh: Matematika"
                               required>

                    </div>

                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="btn-primary mt-6">

                    {{ isset($edit) ? 'Update Data' : 'Simpan Data' }}

                </button>

                @if(isset($edit))

                    <a href="/guru"
                       class="ml-3 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-2xl">

                        Batal

                    </a>

                @endif

            </form>

        </div>

        <!-- TABEL -->
        <div class="card">

            <h2 class="text-2xl font-bold mb-6">
                Daftar Guru
            </h2>

            <div class="overflow-x-auto">

                <table class="w-full border-collapse">

                    <thead>

                        <tr class="table-header">

                            <th class="p-4 text-left rounded-l-xl">
                                No
                            </th>

                            <th class="p-4 text-left">
                                Nama Guru
                            </th>

                            <th class="p-4 text-left">
                                Mata Pelajaran
                            </th>

                            <th class="p-4 text-left rounded-r-xl">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse(($guru ?? []) as $item)

                        <tr class="table-row border-b">

                            <!-- NO -->
                            <td class="p-4">
                                {{ $loop->iteration }}
                            </td>

                            <!-- NAMA -->
                            <td class="p-4 font-semibold text-gray-800">
                                {{ $item->nama }}
                            </td>

                            <!-- MAPEL -->
                            <td class="p-4 text-gray-700">
                                {{ $item->mapel }}
                            </td>

                            <!-- AKSI -->
                            <td class="p-4">

                                <div class="flex gap-3">

                                    <!-- EDIT -->
                                    <a href="/guru/edit/{{ $item->id }}"
                                       class="btn-edit">

                                        Edit

                                    </a>

                                    <!-- HAPUS -->
                                    <a href="/guru/delete/{{ $item->id }}"
                                       onclick="return confirm('Yakin hapus data?')"
                                       class="btn-delete">

                                        Hapus

                                    </a>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4"
                                class="p-6 text-center text-gray-500">

                                Data guru belum ada

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>