@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/welcome">Lab-Informatika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<style>
        input[type="text"],
        input[type="url"],
        textarea,
        select,
        input[type="file"] {
            border: 2px solid #333; 
            outline: none;
            padding: 8px;
            border-radius: 4px;
            background-color: white;
        }

        input[type="text"]:focus,
        input[type="url"]:focus,
        textarea:focus,
        select:focus,
        input[type="file"]:focus {
            border-color: #007bff; 
            box-shadow: 0 0 5px rgba(0,123,255,0.5);
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
<div class="container mt-5">
    <h2>Add New Project</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">user id</label>
            <input type="text" class="form-control" name="user_id" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Project Description</label>
            <textarea class="form-control" name="description" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select name="tags[]" class="form-select" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="mb-3">
            <label for="credit" class="form-label">Credit</label>
            <input type="text" class="form-control" name="credit">
        </div>

        <div class="mb-3">
            <label for="source" class="form-label">Source Code Link</label>
            <input type="url" class="form-control" name="source">
        </div>

        <button type="submit" class="btn btn-primary">Submit Project</button>
    </form>
</div>
 <div class="mb-3">
        </div>
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
@endsection
