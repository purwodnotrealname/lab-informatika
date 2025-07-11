<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Dashboard - Lab Informatika</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                        <a class="nav-link active" href="#dashboard">
                            <i class="fas fa-home mr-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">
                            <i class="fas fa-project-diagram mr-1"></i>Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#research">
                            <i class="fas fa-flask mr-1"></i>Research
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <i class="fas fa-user-circle mr-1"></i>John Doe
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Profile</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
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
                    <h1 class="display-4 font-weight-bold mb-3">Welcome Back, John!</h1>
                    <p class="lead mb-4">
                        Continue your journey in advancing computer science research and innovation 
                        at Laboratorium Informatika Universitas Udayana.
                    </p>
                    <div class="d-flex flex-wrap">
                        <a href="#projects" class="btn btn-light btn-custom mr-3 mb-2">
                            <i class="fas fa-plus mr-2"></i>New Project
                        </a>
                        <a href="#research" class="btn btn-outline-light btn-custom mb-2">
                            <i class="fas fa-search mr-2"></i>Browse Research
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <img src="https://via.placeholder.com/200x200/667eea/ffffff?text=JD" alt="Profile" class="profile-avatar">
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="container mt-5">
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
    </section>

<div class="row mb-4">
    <!-- Kolom 8: grafik + Active Projects -->
    <div class="col-lg-8">
        <!-- Active Projects -->
        <div class="card">
            <div class="card-body">
                <h5 class="section-title mb-4">Your Active Projects</h5>

                <div class="project-card">
                    <div class="card-body position-relative">
                        <span class="project-status status-active">Active</span>
                        <h5 class="card-title">AI-Powered Medical Diagnosis System</h5>
                        <p class="card-text text-muted">
                            Developing machine learning algorithms for early disease detection using medical imaging data.
                        </p>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="small">Progress</span>
                                <span class="small">75%</span>
                            </div>
                            <div class="progress progress-custom">
                                <div class="progress-bar bg-success" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-calendar mr-1"></i>Due: Dec 2024
                            </small>
                            <div>
                                <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Kolom 4: Quick Actions -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-rocket mr-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body text-center quick-actions">
                <button class="btn btn-primary btn-block mb-2">
                    <i class="fas fa-plus mr-2"></i>Add New Project
                </button>
                <button class="btn btn-success btn-block mb-2">
                    <i class="fas fa-user-plus mr-2"></i>Add User
                </button>
                <button class="btn btn-info btn-block mb-2">
                    <i class="fas fa-upload mr-2"></i>Upload Research
                </button>
                <button class="btn btn-warning btn-block mb-2">
                    <i class="fas fa-wrench mr-2"></i>Manage Tags
                </button>
                <button class="btn btn-secondary btn-block">
                    <i class="fas fa-download mr-2"></i>Export Data
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>