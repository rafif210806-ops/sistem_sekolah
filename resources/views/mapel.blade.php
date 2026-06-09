<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Pelajaran</title>

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
                <a href="/guru" class="menu-item">
                    👨‍🏫 Data Guru
                </a>
            </li>

            <li>
                <a href="/mapel" class="menu-item menu-active">
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
                Data Mata Pelajaran
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola data mata pelajaran SMA
            </p>

        </div>

        <!-- FORM -->
        <div class="card">

            <h2 class="text-2xl font-bold mb-6">

                {{ isset($edit) ? 'Edit Mata Pelajaran' : 'Form Input Mata Pelajaran' }}

            </h2>

            <form action="{{ isset($edit) ? '/mapel/update/'.$edit->id : '/mapel' }}"
                  method="POST">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- MAPEL -->
                    <div>

                        <label class="block mb-2 font-semibold">
                            Mata Pelajaran
                        </label>

                        <input
                            type="text"
                            name="nama_mapel"
                            value="{{ isset($edit) ? $edit->nama_mapel : '' }}"
                            placeholder="Contoh: Matematika"
                            class="input"
                            required
                        >

                    </div>

                    <!-- GURU -->
                    <div>

                        <label class="block mb-2 font-semibold">
                            Guru
                        </label>

                        <input
                            type="text"
                            name="guru"
                            value="{{ isset($edit) ? $edit->guru : '' }}"
                            placeholder="Nama Guru"
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
                            placeholder="Contoh: X IPA 1"
                            class="input"
                            required
                        >

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="mt-6 flex gap-3">

                    <button
                        type="submit"
                        class="btn-primary"
                    >

                        {{ isset($edit) ? 'Update Data' : 'Simpan Data' }}

                    </button>

                    @if(isset($edit))

                    <a href="/mapel"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-2xl">

                        Batal

                    </a>

                    @endif

                </div>

            </form>

        </div>

        <!-- TABEL -->
        <div class="card">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold">
                    Daftar Mata Pelajaran
                </h2>

                <input
                    type="text"
                    placeholder="Cari mapel..."
                    class="input w-64"
                >

            </div>

            <div class="overflow-x-auto">

                <table class="w-full border-collapse">

                    <!-- HEADER -->
                    <thead>

                        <tr class="table-header">

                            <th class="p-4 text-left rounded-l-xl">
                                No
                            </th>

                            <th class="p-4 text-left">
                                Mata Pelajaran
                            </th>

                            <th class="p-4 text-left">
                                Guru
                            </th>

                            <th class="p-4 text-left">
                                Kelas
                            </th>

                            <th class="p-4 text-left rounded-r-xl">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <!-- BODY -->
                    <tbody>

                     @forelse(($mapel ?? []) as $item)

                        <tr class="table-row border-b">

                            <!-- NO -->
                            <td class="p-4">
                                {{ $loop->iteration }}
                            </td>

                            <!-- MAPEL -->
                            <td class="p-4 font-semibold">
                                {{ $item->nama_mapel }}
                            </td>

                            <!-- GURU -->
                            <td class="p-4">
                                {{ $item->guru }}
                            </td>

                            <!-- KELAS -->
                            <td class="p-4">
                                {{ $item->kelas }}
                            </td>

                            <!-- AKSI -->
                            <td class="p-4">

                                <div class="flex gap-2">

                                    <!-- EDIT -->
                                    <a href="/mapel/edit/{{ $item->id }}"
                                       class="btn-edit">

                                        Edit

                                    </a>

                                    <!-- HAPUS -->
                                    <a href="/mapel/delete/{{ $item->id }}"
                                       onclick="return confirm('Yakin hapus data?')"
                                       class="btn-delete">

                                        Hapus

                                    </a>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="p-6 text-center text-gray-500">

                                Data mata pelajaran belum ada

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