<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa | Sekolah SMKN 1 KAWALI</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- CSS Kustom -->
    @vite(['resources/css/index.css', 'resources/js/app.js'])
</head>

<body class="siswa-page sea-bg">

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-mortarboard-fill"></i> SMKN 1 KAWALI
        </a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active fw-semibold" href="{{ route('siswa.index') }}">
                    <i class="bi bi-people-fill"></i> Siswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kelas.index') }}">
                    <i class="bi bi-building"></i> Kelas
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- ================= -->

<!-- Wave Background -->
<div class="wave wave1"></div>
<div class="wave wave2"></div>
<div class="wave wave3"></div>

<div class="container mt-4">
    <div class="header-card">
        <h2 class="text-center mb-3">
            <i class="bi bi-people-fill header-icon"></i> Data Siswa
        </h2>
        <p class="text-center subtitle">SMKN 1 KAWALI</p>
    </div>

    @if(session('success'))
        <div id="alert-success" class="alert-custom success">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        </div>
    @endif

    <div class="main-card">
        <div class="card-header-custom d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-list-ul"></i> Daftar Siswa
            </h5>
            <a href="{{ route('siswa.create') }}" class="btn-add">
                <i class="bi bi-plus-circle"></i> Tambah Siswa
            </a>
        </div>

        <div class="table-responsive">
            <table class="table-custom table table-striped table-hover">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($data as $dt)
                    <tr>
                        <td>{{ $dt->nis }}</td>
                        <td>{{ $dt->nama }}</td>
                        <td>{{ $dt->kelas->nama_kelas ?? '-' }}</td>
                        <td>
                            @if($dt->jenis_kelamin == 'L')
                                Laki-laki
                            @elseif($dt->jenis_kelamin == 'P')
                                Perempuan
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $dt->alamat }}</td>
                        <td>{{ $dt->no_telp }}</td>
                        <td>
                            <a href="{{ route('siswa.edit', $dt->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('siswa.destroy', $dt->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Data kosong</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
