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
                        <button type="button" data-toggle="modal" data-target="#form-modal" data-title=""
                            data-description="" data-image="" data-credit="" data-video_link="" data-demo_link=""
                            class="btn btn-light btn-custom mr-3 mb-2">
                            <i class="fas fa-plus mr-2"></i>New Project
                        </button>
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
                <div class="col-md-3 stat-item">
                    <div class="stat-number">0</div>
                    <div>Credit Amount</div>
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
                                <p class="card-subtitle mb-2 text-muted">
                                    Credit cost: {{ $work->credit }}
                                </p>
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

                                    <button data-target="#form-modal" data-toggle="modal" type="button"
                                        class="btn btn-primary btn-sm" data-title="{{ $work['title'] }}"
                                        data-description="{{ $work['description'] }}" data-image="{{ $work['image'] }}"
                                        data-credit="{{ $work['credit'] }}" data-video_link="{{ $work['video_link'] }}"
                                        data-demo_link="{{ $work['demo_link'] }}" data-tag_id="{{ $work['tag_id'] }}"
                                        data-id={{ $work['id'] }}>
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

    <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form-modalLabel">Add new project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-tag_id="">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Project Title <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Project Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Project Image<span class="text-danger">*</span><small>
                                    (Only upload when updating)</small></label>
                            <input type="file" class="form-control" name="image" required>
                        </div>

                        <div class="mb-3">
                            <label for="credit" class="form-label">Credit<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="credit" required>
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
                            <label for="source" class="form-label">Source Code (.zip, .rar, .7z.)<small> (Only upload
                                    when updating)</small><span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="source" accept=".zip,.rar,.tar,.gz,.7z"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="tag">Type of Project<span class="text-danger">*</span></label>
                            <select name="tag_id" class="form-select form-control" required>
                                <option value="">Choose a Type</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary center">Submit Project</button>
                    </div>
                </form>
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

            $('#form-modal').on('show.bs.modal', function (event) {
                var modal = $(this);
                var button = $(event.relatedTarget);

                var proj_id = button.data('id');
                var title = button.data('title');
                var description = button.data('description');
                var credit = button.data('credit');
                var video_link = button.data('video_link');
                var demo_link = button.data('demo_link');
                var tag_id = button.data('tag_id');

                modal.find('input[name=title]').val(title)
                modal.find('textarea[name=description]').text(description)
                modal.find('input[name=credit]').val(credit)
                modal.find('input[name=video_link]').val(video_link)
                modal.find('input[name=demo_link]').val(demo_link)
                modal.find('select').val(tag_id)
                if (button.text().includes("Edit")) {
                    modal.find('form').attr('action', '/project/update/' + proj_id)
                    modal.find('input[name=source]').attr('required', false)
                    modal.find('input[name=image]').attr('required', false)
                    modal.find('button[type=submit]').text('Edit Project')
                } else {
                    modal.find('form').attr('action', '{{ route('project.store') }}')
                    modal.find('input[name=source]').attr('required', true)
                    modal.find('input[name=image]').attr('required', true)
                    modal.find('button[type=submit]').text('Add New Project')
                }
            })
        </script>
</body>