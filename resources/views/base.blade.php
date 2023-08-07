<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>@yield('title') | ImmoLaravel</title>
    <style>
      @layer reset {
        button {
          all: unset;
        }
      }
      .htmx-indicator{
        display:none;
      }
      .htmx-request .htmx-indicator{
        display:inline-block;
      }
      .htmx-request.htmx-indicator{
        display:inline-block;
      }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">ImmoLaravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
        $route = request()->route()->getName();
        @endphp
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')]) >Recherche</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'admin.')])>Gestion des biens</a> 
            </li>
          </ul>
                @if (Route::has('login'))
                    <div class=" ms-auto sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                        <ul class="navbar-nav">
                            @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}"  @class(['nav-link', 'active' => str_contains($route, 'login.')])>Se connecter</a>
                            </li>
        
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}"  @class(['nav-link', 'active' => str_contains($route, 'logout.')])>S'inscrire </a>
                            </li>
                            @endif

                            @endauth
                        </ul>
                    </div>
                @endif
        </div>
    </div>
</nav>

@yield('content')


</body>
</html>
