<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSS CUSTOM -->
    <link rel="stylesheet" href="{{ asset('css/siswa.css') }}">

</head>

<body>

<div class="flex">

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
                <a href="/siswa" class="menu-item menu-active">
                    👨‍🎓 Data Siswa
                </a>
            </li>

            <li>
                <a href="/guru" class="menu-item">
                    👨‍🏫 Data Guru
                </a>
            </li>

            <li>
                <a href="/mapel" class="menu-item">
                    📚 Mata Pelajaran
                </a>
            </li>

        </ul>

        <!-- ADMIN -->
        <div class="mt-20 bg-white/10 p-4 rounded-2xl">

            <h2 class="font-bold text-lg">
                Admin
            </h2>

            <p class="text-gray-300 text-sm">
                {{ session('admin') }}
            </p>

            <a href="/logout">

                <button class="btn-delete w-full mt-4">
                    Logout
                </button>

            </a>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-8">

        <!-- HEADER -->
        <div class="mb-8">

            <h1 class="text-4xl font-bold text-gray-800">
                Data Siswa
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola data siswa SMA
            </p>

        </div>

        <!-- FORM -->
        <div class="card">

            <h2 class="text-2xl font-bold mb-6">

                {{ isset($edit) ? 'Edit Data Siswa' : 'Form Input Siswa' }}

            </h2>

            <form action="{{ isset($edit) ? '/siswa/update/'.$edit->id : '/siswa' }}"
                  method="POST">

                @csrf

                <div class="grid grid-cols-2 gap-6">

                    <!-- NAMA -->
                    <div>

                        <label class="block mb-2 font-semibold">
                            Nama Siswa
                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ isset($edit) ? $edit->nama : '' }}"
                            placeholder="Masukkan nama siswa"
                            class="input"
                            required
                        >

                    </div>

                    <!-- KELAS -->
                    <div>

                        <label class="block mb-2 font-semibold">
                            Kelas
                        </label>

                        <input
                            type="text"
                            name="kelas"
                            value="{{ isset($edit) ? $edit->kelas : '' }}"
                            placeholder="Contoh: XII IPA 1"
                            class="input"
                            required
                        >

                    </div>

                    <!-- ALAMAT -->
                    <div>

                        <label class="block mb-2 font-semibold">
                            Alamat
                        </label>

                        <input
                            type="text"
                            name="alamat"
                            value="{{ isset($edit) ? $edit->alamat : '' }}"
                            placeholder="Masukkan alamat"
                            class="input"
                            required
                        >

                    </div>

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="btn-primary mt-6"
                >

                    {{ isset($edit) ? 'Update Data' : 'Simpan Data' }}

                </button>

                @if(isset($edit))

                <a href="/siswa"
                   class="ml-3 bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-2xl">

                    Batal

                </a>

                @endif

            </form>

        </div>

        <!-- TABEL -->
        <div class="card">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold">
                    Daftar Siswa
                </h2>

                <input
                    type="text"
                    placeholder="Cari siswa..."
                    class="input w-64"
                >

            </div>

            <table class="w-full">

                <thead>

                    <tr class="table-header">

                        <th class="p-4 text-left rounded-l-xl">
                            No
                        </th>

                        <th class="p-4 text-left">
                            Nama
                        </th>

                        <th class="p-4 text-left">
                            Kelas
                        </th>

                        <th class="p-4 text-left">
                            Alamat
                        </th>

                        <th class="p-4 text-left rounded-r-xl">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($siswa as $item)

                    <tr class="table-row border-b">

                        <!-- NO -->
                        <td class="p-4">
                            {{ $loop->iteration }}
                        </td>

                        <!-- NAMA -->
                        <td class="p-4 font-semibold">
                            {{ $item->nama }}
                        </td>

                        <!-- KELAS -->
                        <td class="p-4">
                            {{ $item->kelas }}
                        </td>

                        <!-- ALAMAT -->
                        <td class="p-4">
                            {{ $item->alamat }}
                        </td>

                        <!-- AKSI -->
                        <td class="p-4 flex gap-2">

                            <!-- EDIT -->
                            <a href="{{ url('/siswa/edit/'.$item->id) }}"
                               class="btn-edit">

                                Edit

                            </a>

                            <!-- HAPUS -->
                            <a href="/siswa/delete/{{ $item->id }}"
                               onclick="return confirm('Yakin hapus data?')"
                               class="btn-delete">

                                Hapus

                            </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>