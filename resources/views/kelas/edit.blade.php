<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
     @vite(['resources/css/rap.css', 'resources/js/app.js'])
</head>
<body>

<div class="container mt-4">
    <h3>Edit Kelas</h3>

    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas"
                   class="form-control"
                   value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan"
                   class="form-control"
                   value="{{ old('jurusan', $kelas->jurusan) }}" required>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
