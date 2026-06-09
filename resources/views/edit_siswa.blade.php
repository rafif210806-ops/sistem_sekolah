<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="container mx-auto p-10">

    <div class="bg-white p-8 rounded-3xl shadow w-1/2 mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Edit Data Siswa
        </h1>

        <form action="/siswa/update/{{ $siswa->id }}" method="POST">

            @csrf

            <div class="mb-5">

                <label class="block mb-2">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ $siswa->nama }}"
                    class="w-full border p-3 rounded-xl"
                >

            </div>

            <div class="mb-5">

                <label class="block mb-2">
                    Kelas
                </label>

                <input
                    type="text"
                    name="kelas"
                    value="{{ $siswa->kelas }}"
                    class="w-full border p-3 rounded-xl"
                >

            </div>

            <div class="mb-6">

                <label class="block mb-2">
                    Alamat
                </label>

                <input
                    type="text"
                    name="alamat"
                    value="{{ $siswa->alamat }}"
                    class="w-full border p-3 rounded-xl"
                >

            </div>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                Update

            </button>

        </form>

    </div>

</div>

</body>
</html>