<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

<div class="container mt-4">
    <h3>{{ isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa' }}</h3>

    <form action="{{ isset($siswa) ? route('siswa.update', $siswa->id) : route('siswa.store') }}" 
          method="POST" class="p-4 shadow-sm rounded bg-light">
        @csrf
        @if(isset($siswa))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control"
                   value="{{ old('nis', optional($siswa)->nis) }}" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control"
                   value="{{ old('nama', optional($siswa)->nama) }}" required>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select name="id_kelas" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}"
                        {{ old('id_kelas', optional($siswa)->id_kelas) == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" {{ old('jenis_kelamin', optional($siswa)->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', optional($siswa)->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ old('alamat', optional($siswa)->alamat) }}</textarea>
        </div>

        <div class="mb-3">
            <label>No Telepon</label>
            <input type="text" name="no_telp" class="form-control"
                   value="{{ old('no_telp', optional($siswa)->no_telp) }}" required>
        </div>

        <button class="btn btn-primary"><i class="bi bi-save"></i> {{ isset($siswa) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </form>
</div>

</body>
</html>
