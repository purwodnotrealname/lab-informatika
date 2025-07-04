<!DOCTYPE html>
<html lang="id"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Lab Informatika Universitas Udayana</title>
    <style>
        .navbar-brand {
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .hero-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            padding: 80px 0 60px;
            margin-top: 20px;
            border-radius: 0 0 20px 20px;
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            background: #2c3e50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .feature-icon i {
            font-size: 24px;
            color: white;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 25px;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        .btn-primary {
            background: #2c3e50;
            border: none;
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background: #1a252f;
            transform: translateY(-3px);
        }
        .section-title {
            position: relative;
            margin-bottom: 40px;
            padding-bottom: 15px;
        }
        .section-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: #2c3e50;
            border-radius: 2px;
        }
        footer {
            background: #2c3e50;
            color: rgba(255,255,255,0.8);
            padding: 50px 0 20px;
        }
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            transition: all 0.3s;
        }
        .social-icon:hover {
            background: #3498db;
            transform: translateY(-3px);
        }
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #2c3e50;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            opacity: 0;
            transition: all 0.3s;
            z-index: 1000;
        }
        .back-to-top.show {
            opacity: 1;
        }
    </style>
</head>
<body data-new-gr-c-s-check-loaded="14.1242.0" data-gr-ext-installed="">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Lab-Informatika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/account">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="hero-section mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="mx-auto mb-4">
                    </div>
                    
                    <h1 class="display-4 font-weight-bold text-dark mb-3">Inovasi Teknologi</h1>
                    <h2 class="h3 font-weight-light text-muted mb-4">Untuk Masa Depan</h2>
                    
                    <p class="lead text-muted mb-5">
                        Laboratorium Informatika Universitas Udayana mempersembahkan solusi teknologi terkini 
                        untuk mengatasi tantangan masa depan melalui penelitian dan pengembangan inovatif.
                    </p>
                    
                    <a href="/showcase" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-search mr-2"></i>Telusuri Proyek
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    
    <!-- Proyek Section -->
    <section id="proyek" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title display-5 font-weight-bold">Proyek Terbaru</h2>
                <p class="text-muted">Inovasi terbaru yang dikembangkan oleh tim peneliti kami</p>
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1170&amp;q=80" class="card-img-top" alt="AI Healthcare">
                        <div class="card-body">
                            <h5 class="card-title">Sistem Diagnosis Medis AI</h5>
                            <p class="card-text text-muted">Platform kecerdasan buatan untuk membantu diagnosis penyakit dengan akurasi tinggi.</p>
                            <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1170&amp;q=80" class="card-img-top" alt="Smart Agriculture">
                        <div class="card-body">
                            <h5 class="card-title">IoT untuk Pertanian Cerdas</h5>
                            <p class="card-text text-muted">Sistem pemantauan tanaman berbasis IoT untuk meningkatkan hasil pertanian.</p>
                            <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1170&amp;q=80" class="card-img-top" alt="Data Analytics">
                        <div class="card-body">
                            <h5 class="card-title">Analisis Data Pariwisata Bali</h5>
                            <p class="card-text text-muted">Platform analitik untuk mengoptimalkan strategi pariwisata daerah.</p>
                            <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary px-4">
                    <i class="fas fa-list mr-2"></i>Lihat Semua Proyek
                </a>
            </div>
        </div>
    </section>
    
    <!-- Tentang Section -->
    <section id="tentang" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="section-title display-5 font-weight-bold mb-4">Tentang Laboratorium Kami</h2>
                    <p class="text-muted mb-4">
                        Laboratorium Informatika Universitas Udayana dikembangkan pada tahun 2025 oleh Kelompok 2B Angkatan 2023 dengan misi 
                        inovatif sebagaia wadah showcase proyek-proyek mahasiswa.
                    </p>
                    <div class="d-flex">
                        <div class="mr-4">
                            <h3 class="text-primary">xx</h3>
                            <p class="text-muted">Proyek Selesai</p>
                        </div>
                        <div>
                            <h3 class="text-primary">xx</h3>
                            <p class="text-muted">Kolaborator</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="border rounded p-3 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=1170&amp;q=80" class="img-fluid rounded" alt="Tim Lab Informatika">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h4 class="text-white mb-4">
                        <i class="fas fa-laptop-code mr-2"></i>Lab Informatika
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
                
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="text-white mb-4">About us</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50">Proyek Penelitian</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50">Publikasi</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50">Bergabung dengan Kami</a></li>
                        <li><a href="#" class="text-white-50">Kontak</a></li>
                    </ul>
                </div>
            
            <hr class="bg-light mt-5 mb-4">
            
        </div>
    </div></footer>
    
    <!-- Back to top button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script>
        // Back to top button
        $(document).ready(function(){
            $(window).scroll(function(){
                if ($(this).scrollTop() > 300) {
                    $('.back-to-top').addClass('show');
                } else {
                    $('.back-to-top').removeClass('show');
                }
            });
            
            $('.back-to-top').click(function(e){
                e.preventDefault();
                $('html, body').animate({scrollTop:0}, '300');
            });
            
            // Smooth scrolling for anchor links
            $('a[href*="#"]').on('click', function(e) {
                e.preventDefault();
                
                $('html, body').animate(
                    {
                        scrollTop: $($(this).attr('href')).offset().top - 70,
                    },
                    500,
                    'linear'
                );
            });
        });
    </script>

</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>