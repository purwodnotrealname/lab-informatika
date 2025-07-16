<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>About - Lab Informatika</title>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">

</head>

<body>
    <!-- Your Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Lab-Informatika</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/showcase">Showcase</a>
                    </li>
                    @if(auth()->user())
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/topup">Top Up</a>
                        </li>
                        @if(auth()->user()->role == 'student')
                            <li class="nav-item">
                                <button disabled class="btn btn-outline-light">Credit:
                                    {{ auth()->user()->balance->amount ?? 0 }}</button>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container content-section">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
            </ol>
        </nav>

        <!-- Page Title -->
        <h1 class="mb-4">Tentang Kami</h1>

        <!-- About Content -->
        <div class="mb-5">
            <p>Laboratorium Komputer Program Studi Informatica, Universitas Udayana, adalah fasilitas akademik yang
                didedikasikan untuk mendukung kegiatan belajar-mengajar, penelitian, dan pengembangan teknologi
                informasi. Sebagai pusat kegiatan akademik, laboratorium ini menyediakan infrastruktur terkini dan
                lingkungan yang kondusif bagi mahasiswa dan dosen untuk mengeksplorasi berbagai aspek ilmu komputer.</p>

            <p>Laboratorium ini juga menjadi wadah kolaborasi antara mahasiswa, dosen, dan praktisi untuk menciptakan
                inovasi teknologi yang bermanfaat bagi masyarakat. Dengan visi menjadi pusat keunggulan di bidang
                teknologi informasi, kami terus berkomitmen untuk memberikan pelayanan terbaik dalam menunjang
                pembelajaran dan riset.</p>
        </div>

        <!-- Profile Section -->
        <h2 class="mb-4">Profil Pengelola</h2>

        <div class="profile-card">
            <h3>Nama Lengkap</h3>
            <p> Ir. I Gusti Agung Gede Arya Kadyanan, S.Kom., M.Kom.</p>

            <h3>Jabatan Fungsional</h3>
            <p>Lektor</p>

            <h3>Riwayat Pendidikan</h3>
            <ul>
                <li>S1. STIKOM Surabaya, Sistem Informasi, 2003-2007</li>
                <li>S2. Universitas Indonesia, Ilmu Komputer, 2009-2011</li>
            </ul>
        </div>

        <!-- Research Section -->
        <h2 class="mb-4">Penelitian 5 Tahun Terakhir</h2>

        <table class="research-table">
            <thead>
                <tr>
                    <th>Judul Penelitian</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>"Pendekatan Objek dengan Framework"</td>
                    <td>2013</td>
                </tr>
                <tr>
                    <td>"Perancangan Sistem Rekomendasi Untuk Menentukan Dewasa Ayu (Hari Baik) Untuk Pelaksanaan Yadnya
                        Di Bali"</td>
                    <td>2017</td>
                </tr>
                <tr>
                    <td>"Pengembangan Web Portal Wisata Terintegrasi E-Commerce Untuk Pelayanan Pertunjukan Seni Dan
                        Budaya"</td>
                    <td>2018</td>
                </tr>
                <tr>
                    <td>"Pengembangan Rekomender Sistem Layanan Kesehatan Terintegrasi E-Commerce"</td>
                    <td>2018</td>
                </tr>
                <tr>
                    <td>"Tariipedia Sebagai Ensiklopedia Budaya Terintegrasi E-Commerce"</td>
                    <td>2019</td>
                </tr>
                <tr>
                    <td>"Aplikasi Sistem Informasi Pengelolaan Pertunjukan Seni Terintegrasi Berbasis Crowd Sourcing"
                    </td>
                    <td>2019</td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer id="kontak">
        <div class="container">
            <div class="row justify-content-center">
                <div class="ml-4 col-lg-4 mx-auto mb-4 mb-lg-0">
                    <h4 class="text-white mb-4">
                        <i class="fas fa-laptop-code"></i>Lab Informatika
                    </h4>
                    <p class="mb-4">
                        Universitas Udayana<br>
                        Jl. Raya Kampus UNUD, Bukit Jimbaran<br>
                        Kuta Selatan, Badung, Bali 80361
                    </p>
                    <div>
                        <a href="#" class="social-icon mr-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon mr-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon mr-2">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <hr class="bg-light mt-5 mb-4">

            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>