<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Lab Informatika</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-flask mr-2"></i>Lab-Informatika
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown">
                            <i class="fas fa-user-circle mr-1"></i>{{ auth()->user()->username }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Profile</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('attemptlogout') }}"><i
                                    class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 font-weight-bold mb-3">Welcome Back, {{ auth()->user()->username }}!</h1>
                    <p class="lead mb-4">
                        Continue your journey in advancing computer science research and innovation
                        at Laboratorium Informatika Universitas Udayana.
                    </p>
                    <div class="d-flex flex-wrap">
                        <a href="{{ route('project.create') }}" class="btn btn-light btn-custom mr-3 mb-2">
                            <i class="fas fa-plus mr-2"></i>New Project
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="container mt-5">
        <div class="quick-stats">
            <div class="row">
                <div class="col-md-3 stat-item">
                    <div class="stat-number">{{ $works->count() }}</div>
                    <div>Active Projects</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="container mb-5">
        <div class="row">
            <!-- Active Projects -->
            <div class="col-lg-8 mb-4">
                <h2 class="section-title">Your Active Projects</h2>
                @foreach($works as $work)
                    <div class="project-card">
                        <div class="card-body position-relative">
                            <div class="mb-3">
                                <h2>
                                    {{ $work->title }}
                                </h2>
                                <p>
                                    {{ $work->description }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <button href="#" class="btn btn-outline-primary" data-toggle="modal"
                                        data-target="#projectModal" data-title="{{ $work['title'] }}"
                                        data-description="{{ $work['description'] }}"
                                        data-image="{{ $work['image_url'] ?? 'default.jpg' }}"
                                        data-members="{{ implode(',', $work['members'] ?? []) }}"
                                        data-video="{{ $work['video_url'] ?? '#' }}">View Details</button>

                                    <button href="#" class="btn btn-primary btn-sm">
                                        Edit</button>
                                    <form method="POST" action="{{ route('project.delete', $work->id) }}"
                                        onsubmit="return confirm('Apakah ingin menghapus project ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel"
        aria-hidden="true">
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
                    <a href="#" target="_blank" id="projectVideo"
                        class="btn btn-outline-primary btn-sm mt-2 d-none">Lihat Video</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script>
        $('#projectModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var title = button.data('title');
            var description = button.data('description');
            var image = button.data('image');
            var members = button.data('members');
            var video = button.data('video');

            var modal = $(this);
            modal.find('.modal-title').text(title);
            modal.find('#projectDescription').text(description);
            modal.find('#projectImage').attr('src', image);
            modal.find('#projectVideo').attr('href', video);
        });

    </script>
</body>