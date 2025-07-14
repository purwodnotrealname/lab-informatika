@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/projectadd.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                        <a class="nav-link active" href="/showcase">Showcase</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Add New Project</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Project Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Project Description</label>
                <textarea class="form-control" name="description" rows="4"></textarea>
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
                <label for="video_link" class="form-label">Video Link</label>
                <input type="url" class="form-control" name="video_link">
            </div>

            <div class="mb-3">
                <label for="demo_link" class="form-label">Demo Link</label>
                <input type="url" class="form-control" name="demo_link">
            </div>

            <div class="mb-3">
                <label for="source" class="form-label">Source Code (.zip, .rar, .7z.)</label>
                <input type="file" class="form-control" name="source" accept=".zip,.rar,.tar,.gz,.7z">
            </div>

            Current upload limit: {{ ini_get('upload_max_filesize') }} / {{ ini_get('post_max_size') }}

            <div class="mb-3 mt-4">
                <select name="tag_id" class="form-select">
                    <option value="">Choose a Tag</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary center mb-3">Submit Project</button>
        </form>
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
        </div>
    </footer>

    <!-- Back to top button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <script src="{{ asset('js/projectadd.js') }}"></script>

    </body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

    </html>
@endsection