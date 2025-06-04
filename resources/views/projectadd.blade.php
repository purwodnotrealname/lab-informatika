@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
    border: 2px solid #333;   /* Dark outline */
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
    border-color: #007bff;  /* Bootstrap blue */
    box-shadow: 0 0 5px rgba(0,123,255,0.5);
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
@endsection
