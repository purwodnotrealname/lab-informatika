<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>

<body data-new-gr-c-s-check-loaded="14.1242.0" data-gr-ext-installed="">
    <!-- Navbar -->
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
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="mx-auto mb-4">
                    </div>
                    <!-- Form for Topup -->
                    <!-- HATI - HATI BIKIN FORM, BEDA NAME DIKIT = BEDA HASIL PAYLOAD -->
                    <form id="form" method="POST" class="w-full" enctype="multipart/form-data"
                        action="{{ route('payment.payouts.create') }}">
                        @csrf
                        <div class="mt-2 text-start">
                            <label for="amount">Jumlah Withdraw</label>
                            <input required type="number" name="amount" id="amount" placeholder="ex.: 69"
                                class="w-full p-2 border border-gray-300" />
                            @error('Input Jumlah Token')
                                <span class="text-red-500 block text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="p-2 text-black border-1 rounded-lg  bg-sky-500 hover:bg-sky-600 ">Confirm</button>
                        </div>
                        <div class="mt-2 text-start">
                        </div>
                    </div>
            </div>
    </section>


    <!-- Back to top button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <!--    <script src="{{ asset('js/dashboard.js') }}"></script> -->

</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>