@extends('layouts.app')

@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Showcase</li>
        </ol>
    </nav>

    <h2 class="fw-bold mb-4">Showcase</h2>

    <div class="row g-4">
        @foreach ($projects as $project)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-light">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-semibold">{{ $project->title }}</h5>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">
                        {{ Str::limit($project->description, 200) }}
                    </p>
                    <div class="mt-auto d-flex justify-content-between">
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-dark btn-sm">
                            Details
                        </a>
                        @if ($project->view_url)
                        <a href="{{ $project->view_url }}" target="_blank" class="btn btn-dark btn-sm">
                            View <i class="bi bi-box-arrow-up-right ms-1"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
