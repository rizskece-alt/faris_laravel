<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Data Kelas - SMKN 1 KAWALI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/kelas.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="sea-bg">
<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="bi bi-mortarboard-fill"></i> SMKN 1 KAWALI
        </a>

        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="{{ route('siswa.index') }}">
                <i class="bi bi-people-fill"></i> Data Siswa
            </a>
            <a class="nav-link active" href="{{ route('kelas.index') }}">
                <i class="bi bi-building"></i> Data Kelas
            </a>
        </div>
    </div>
</nav>
<!-- ================= -->

<div class="container mt-4">
    <!-- HEADER CARD -->
    <div class="header-card-kelas">
        <h2>
            <div class="header-icon-kelas">
                <i class="bi bi-building"></i>
            </div>
            Data Kelas
        </h2>
        <p class="subtitle">Manajemen data kelas dan jurusan di SMKN 1 Kawali</p>
    </div>

    <!-- ALERT SUCCESS -->
    @if(session('success'))
        <div class="alert-custom success">
            <div>
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
            <button class="btn-close-custom" onclick="this.parentElement.style.display='none'">
                &times;
            </button>
        </div>
    @endif

    <!-- MAIN CARD -->
    <div class="main-card-kelas">
        <div class="card-header-custom-kelas">
            <h5>
                <i class="bi bi-table"></i>
                Daftar Kelas
            </h5>
            <a href="{{ route('kelas.create') }}" class="btn-add-kelas">
                <i class="bi bi-plus-circle"></i>
                Tambah Kelas
            </a>
        </div>
        
        @if(count($data) > 0)
            <div class="table-responsive">
                <table class="table table-custom-kelas">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>
                                    <span class="number-badge">{{ $loop->iteration }}</span>
                                </td>
                                <td>
                                    <span class="kelas-badge">{{ $dt->nama_kelas }}</span>
                                </td>
                                <td>
                                    <span class="jurusan-badge">{{ $dt->jurusan }}</span>
                                </td>
                                <td>
                                    <div class="action-buttons-kelas">
                                        <a href="{{ route('kelas.edit', $dt->id) }}" class="btn-action-kelas edit">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('kelas.destroy', $dt->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action-kelas delete" onclick="return confirm('Yakin ingin menghapus kelas ini?')">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- CARD FOOTER -->
            <div class="card-footer-custom-kelas">
                <div class="total-info-kelas">
                    <i class="bi bi-list-ol"></i>
                    <span>Total: {{ count($data) }} Kelas</span>
                </div>
                <div class="last-update-kelas">
                    <i class="bi bi-clock-history"></i>
                    <span>Terakhir diperbarui: {{ now()->format('d M Y, H:i') }}</span>
                </div>
            </div>
        @else
            <!-- EMPTY STATE -->
            <div class="empty-state-kelas">
                <i class="bi bi-building-slash empty-icon-kelas"></i>
                <h5>Belum Ada Data Kelas</h5>
                <p>Mulai dengan menambahkan data kelas pertama Anda</p>
                <a href="{{ route('kelas.create') }}" class="btn-empty-state">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Kelas Pertama
                </a>
            </div>
        @endif
    </div>
</div>

<!-- SCROLL TO TOP BUTTON -->
<button class="scroll-top-kelas" id="scrollTopBtn">
    <i class="bi bi-chevron-up"></i>
</button>

<script>
    // Scroll to top functionality
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollTopBtn.classList.add('visible');
        } else {
            scrollTopBtn.classList.remove('visible');
        }
    });
    
    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Auto hide success alert after 5 seconds
    const successAlert = document.querySelector('.alert-custom.success');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.transition = 'opacity 0.5s ease';
            successAlert.style.opacity = '0';
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 500);
        }, 5000);
    }
    
    // Enhanced delete confirmation
    document.querySelectorAll('.delete-form button').forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm('Apakah Anda yakin ingin menghapus kelas ini?\nTindakan ini tidak dapat dibatalkan.')) {
                e.preventDefault();
            }
        });
    });
</script>

</body>
</html>