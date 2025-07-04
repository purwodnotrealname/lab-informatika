<!DOCTYPE html>
<html lang="id"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>dashboard</title>
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
                        <a class="nav-link" href="#">Account</a>
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
                    
                    <h1 class="display-4 font-weight-bold text-dark mb-3">ACCOUNT DASHBOARD</h1>
                    <h2 class="h3 font-weight-light text-muted mb-4">user xxx</h2>
                    
                    <p class="lead text-muted mb-5">
                        Laboratorium Informatika Universitas Udayana mempersembahkan solusi teknologi terkini 
                        untuk mengatasi tantangan masa depan melalui penelitian dan pengembangan inovatif.
                    </p>
                    
                    <a href="/project/add" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-search mr-2"></i>Add Project
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    
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