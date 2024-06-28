<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>



  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Usando Vite -->
  @vite(['resources/js/app.js'])
</head>

<body>
  <div id="app">

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
      <div class="row justify-content-between">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">BoolFolio</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="navbar-nav">
        <div class="nav-item text-nowrap ms-2">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
    </header>

    <div class="container-fluid vh-100">
      <div class="row h-100">
        <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link text-white rounded-2 {{ Request::route()->getName() == 'admin.dashboard' ? 'bg-primary' : '' }}"
                  href="{{ route('admin.dashboard') }}">
                  <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                </a>
              </li>

            </ul>
            <h6 class="text-white mt-4">Progetti</h6>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link text-white rounded-2 {{ Request::route()->getName() == 'admin.project.index' ? 'bg-primary' : ''}}"
                  href="{{ route('admin.project.index') }}">
                  <i class="fa-solid fa-table-list"></i> Lista Progetti
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white rounded-2 {{ Request::route()->getName() == 'admin.project.create' ? 'bg-primary' : ''}}"
                  href="{{ route('admin.project.create') }}">
                  <i class="fa-solid fa-square-plus"></i> Aggiungi Progetto
                </a>
              </li>
            </ul>

            <hr class="text-white">

            <h6 class="text-white mt-4">Tipi</h6>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link text-white rounded-2 {{ Request::route()->getName() == 'admin.type.create' ? 'bg-primary' : ''}}"
                  href="{{ route('admin.type.create') }}">
                  <i class="fa-solid fa-square-plus"></i> Aggiungi Tipi
                </a>
              </li>
            </ul>
            
            <hr class="text-white">
            
            <h6 class="text-white mt-4">Tecnologie</h6>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link text-white rounded-2 {{ Request::route()->getName() == 'admin.technology.index' ? 'bg-primary' : ''}}"
                  href="{{ route('admin.technology.index') }}">
                  <i class="fa-solid fa-table-list"></i> Lista Tecnologie
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white rounded-2 {{ Request::route()->getName() == 'admin.technology.create' ? 'bg-primary' : ''}}"
                  href="{{ route('admin.technology.create') }}">
                  <i class="fa-solid fa-square-plus"></i> Aggiungi Tecnologie
                </a>
              </li>
            </ul>

          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-dashboard">
          @yield('content')
        </main>
      </div>
    </div>

  </div>
</body>

</html>
