<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab Informatika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Lab Informatika</a>
        <div>
            <a href="#" class="btn btn-outline-light me-2">About</a>
            <a href="/showcase" class="btn btn-light me-2">Showcase</a>
            <a href="#" class="btn btn-outline-light">Login</a>
        </div>
    </div>
</nav>
<main class="py-4">
    @yield('content')
</main>
</body>
</html>
