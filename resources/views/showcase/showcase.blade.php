<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/showcase.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="/showcase">Account</a>
                    </li>
                    @if(auth()->user())
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        @if(auth()->user()->role == 'student')
                            <li class="nav-item">
                                <button disabled class="btn btn-outline-light">Credit: 0</button>
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

    <form method="GET" action="{{ route('showcase') }}" class="mt-4 mb-4">
        <div class="d-flex justify-content-center align-items-center flex-wrap" style="gap: 1rem;">

            <div class="input-group" style="max-width: 400px; width: 100%;">
                <input type="text" name="search" class="form-control" placeholder="Cari proyek berdasarkan judul..."
                    value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>

            <div>
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value=""> Filter </option>
                    <option value="created_at" {{ request('sort') === 'created_at' ? 'selected' : '' }}>Terbaru</option>
                    <option value="title" {{ request('sort') === 'title' ? 'selected' : '' }}>Nama A-Z</option>
                    <option value="credit" {{ request('sort') === 'credit' ? 'selected' : '' }}>Credit</option>
                </select>
            </div>
        </div>
    </form>

    <div class="container mt-4">
        <div class="row">
            @forelse($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card" style="height: 400px; overflow: hidden;">
                        <div class="card-body" style="padding: 1rem;">
                            <h5 class="card-title">{{ $project['title'] }}</h5>
                            <div class="card">
                                <div class="card-body text-center" style="padding: 5px;">

                                    <img src="{{ asset("storage/showcase/images/{$project->image}") }}" alt="Project Image"
                                        class="img-fluid mb-1" style="height: 200px; width: 100%; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#projectModal"
                                data-title="{{ $project->title }}" data-description="{{ $project->description }}"
                                data-credit="{{ $project->credit }}"
                                data-image="{{ asset('storage/showcase/images/' . $project->image) }}"
                                data-video="{{ $project->video_link }}" data-demo="{{ $project->demo_link }}"
                                data-created-at="{{ $project->created_at->format('M d, Y') }}"
                                data-category="{{ $project->tag->name ?? 'No Category' }}"
                                data-author="{{ $project->user->name ?? 'Unknown' }}" data-project-id="{{ $project->id }}"
                                data-price="{{ $project->price !== null ? $project->price : 0 }}">
                                Details
                            </a>

                            @if (!empty($project->view_url))
                                <a href="{{ $project->view_url }}" target="_blank" class="btn btn-success btn-sm">View</a>
                            @else
                                <button class="btn btn-sm btn-action btn-secondary" data-project-id="{{ $project->id }}"
                                    data-price="{{ $project->price !== null ? $project->price : 0 }}">
                                    <i class="fas fa-spinner fa-spin"></i> Checking...
                                </button>
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
    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModalLabel">Project Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="projectImage" src="" alt="Project Image" class="img-fluid mb-3 rounded">
                        </div>
                        <div class="col-md-6">
                            <h4 id="projectTitle"></h4>
                            <hr>
                            <p><strong>Description:</strong></p>
                            <p id="projectDescription" class="text-justify"></p>

                            <p><strong>Credit:</strong> <span id="projectCredit"></span></p>
                            <p><strong>Created by:</strong> <span id="projectAuthor"></span></p>
                            <p><strong>Created at:</strong> <span id="projectCreatedAt"></span></p>
                            <p><strong>Category:</strong> <span id="projectCategory"></span></p>

                            <div class="mt-3">
                                <a id="projectVideoLink" href="#" target="_blank"
                                    class="btn btn-outline-primary btn-sm mr-2">
                                    <i class="fas fa-video"></i> View Video
                                </a>
                                <a id="projectDemoLink" href="#" target="_blank" class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-external-link-alt"></i> View Demo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Purchase Modal -->
    <div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="purchaseModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purchaseModalLabel">Purchase Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="purchaseForm" method="POST" action="{{ route('purchase.project') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="project_id" id="modalProjectId">
                        <div class="form-group">
                            <label for="projectPrice">Price</label>
                            <input type="number" class="form-control" id="projectPrice" name="amount" readonly>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="confirmPurchase" required>
                            <label class="form-check-label" for="confirmPurchase">I agree to purchase this
                                project</label>
                        </div>
                        <div class="mt-2">
                            <small class="text-muted">Your balance:
                                {{ Auth::check() ? Auth::user()->balance->amount ?? 0 : 0 }} credits</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Purchase</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
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

                <div class="col-lg-4 mx-auto mb-4 mb-lg-0">
                    <h5 class="text-white mb-4">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mbl-2"><a href="#" class="text-white-50">Tentang Kami</a></li>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/showcase.js') }}"></script>


</body>

</html>