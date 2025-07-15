<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Dashboard - Lab Informatika</title>
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
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.work') }}">
                            <i class="fas fa-home mr-1"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.users') }}">
                            <i class="fas fa-home mr-1"></i>Manage Users
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown">
                            <i class="fas fa-user-circle mr-1"></i>{{ auth()->user()->username }}
                        </a>
                        <div class="dropdown-menu">
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
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    {{-- <section class="container mt-5">
        <div class="quick-stats">
            <div class="row">
                <div class="col-md-3 stat-item">
                    <div class="stat-number">5</div>
                    <div>Active Projects</div>
                </div>
                <div class="col-md-3 stat-item">
                    <div class="stat-number">12</div>
                    <div>Completed</div>
                </div>
                <div class="col-md-3 stat-item">
                    <div class="stat-number">3</div>
                    <div>Publications</div>
                </div>
                <div class="col-md-3 stat-item">
                    <div class="stat-number">8</div>
                    <div>Collaborations</div>
                </div>
            </div>
        </div>
    </section> --}}

    <div class="row mb-4">
        <!-- Kolom 8: grafik + Active Projects -->
        <div class="col-lg-12">
            <!-- Active Projects -->
            <div class="card">
                <div class="card-body">
                    <h5 class="section-title mb-4">All Active Projects</h5>

                    <div class="project-card">
                        <div class="card-body position-relative">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Source</th>
                                        <th scope="col">Credit</th>
                                        <th scope="col">Tag</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($works as $work)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td scope="col">{{ $work->title }}</td>
                                            <td scope="col">{{ mb_strimwidth($work->description, 0, 40, '...') }}</td>
                                            <td scope="col"><a href="{{ $work->source }}">{{ $work->source }}</a></td>
                                            <td scope="col">{{ $work->credit }}</td>
                                            <td scope="col">{{ $work->tag->name }}</td>
                                            <td scope="col">
                                                <form action="{{ route('project.delete', $work->id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah anda ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>