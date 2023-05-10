<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footy Finder</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container fixed">
        <a class="navbar-brand" href="/"> Footy Finder</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" id="dynamic-nav-items">
                @foreach (config('navigation.routes') as $route)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $route['path'] }}">{{ $route['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    @yield('content')
</div>
