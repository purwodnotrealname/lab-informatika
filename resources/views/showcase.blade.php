<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
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
   <div class="mb-3">
    <a href="{{ url('/showcase?sort=title') }}" class="btn btn-outline-primary btn-sm">Sort by Title</a>
    <a href="{{ url('/showcase?sort=created_at') }}" class="btn btn-outline-primary btn-sm">Sort by Date</a>
</div>
     <div class="container mt-4">
       <div class="row">
           @foreach($projects as $project)
               <div class="col-md-4 mb-4">
                  <div class="card h-100" style="min-height: 350px;">
                     <div class="card-body" style="padding: 2rem;">
                           <h5 class="card-title">{{ $project['title'] }}</h5>
                           <p class="card-text">{{ $project['description'] }}</p>
                       </div>
                       <div class="card-footer d-flex justify-content-between">
                           <a href="{{ $project['details_url'] }}" class="btn btn-primary btn-sm">Details</a>
                           @if(!empty($project['view_url']))
                               <a href="{{ $project['view_url'] }}" class="btn btn-success btn-sm">View</a>
                           @else
                               <button class="btn btn-secondary btn-sm" disabled>No View</button>
                           @endif
                       </div>
                       <div class="card-footer text-muted small">
                           Created at: {{ $project['created_at'] }}
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>

</body>
</html>