<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/showcase.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Project Showcase</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Lab-Informatika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/welcome">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/showcase">Showcase</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/account">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-3 mb-3">
        <div class="btn-group">
            <a href="{{ url('/showcase?sort=title') }}" class="btn btn-outline-primary btn-sm">Sort by Title</a>
            <a href="{{ url('/showcase?sort=created_at') }}" class="btn btn-outline-primary btn-sm">Sort by Date</a>
        </div>
    </div>
    
  
  <div class="container mt-4">
    <div class="row">
        @forelse($projects as $project)
            <div class="col-md-4 mb-4">
               <div class="card" style="height: 400px; overflow: hidden;">
                    <div class="card-body" style="padding: 1rem;">
                        <h5 class="card-title">{{ $project['title'] }}</h5>
                        <div class="card-body text-center" style="padding: 5px;">
                            @php
                                $imagePath = $project['image'] ?? 'default.jpg'; // fallback to default
                            @endphp
                           <img src="{{ url('/project-image/' . $imagePath) }}" alt="Project Image"
                                alt="Project Image" 
                                class="img-fluid mb-1" 
                                style="height: 200px; width: 100%; object-fit: cover;">
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" 
                            class="btn btn-primary btn-sm"
                            data-toggle="modal"
                            data-target="#projectModal"
                            data-title="{{ $project['title'] }}"
                            data-description="{{ $project['description'] }}"
                            data-image="{{ $project['image_url'] ?? 'default.jpg' }}"
                            data-members="{{ implode(',', $project['members'] ?? []) }}"
                            data-video="{{ $project['video_url'] ?? '#' }}"> Details </a>
                        @if(!empty($project['view_url']))
                            <a href="{{ $project['view_url'] }}" target="_blank" class="btn btn-success btn-sm">View</a>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>No View</button>
                        @endif
                    </div>
                    <div class="card-footer text-muted small">
                        Created at: {{ $project['created_at'] }}
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">No projects found in the database.</div>
            </div>
        @endforelse
    </div>
</div>

<!-- Modal -->  
    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModalLabel">Project Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="projectImage" src="" alt="Project Image" class="img-fluid mb-3">
                    <p id="projectDescription"></p>
                    <ul id="projectMembers" class="list-unstyled"></ul>
                    <a href="#" target="_blank" id="projectVideo" class="btn btn-outline-primary btn-sm mt-2 d-none">Lihat Video</a>
                </div>
            </div>
        </div>
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
                    <h5 class="text-white mb-4">Tautan Cepat</h5>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
<script src="{{ asset('js/showcase.js') }}"></script>


</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>