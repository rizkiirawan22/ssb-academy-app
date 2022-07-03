<nav class="navbar navbar-expand-lg" style="background-color: #16a085!important">
    <div class="container">
      <a href="/"><img src="/img/logo.png" style="max-width: 80px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white {{ ($title === 'Beranda') ? 'fw-bold' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white {{ ($title === 'Anggota') ? 'fw-bold' : '' }}" aria-current="page" href="/anggota">Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white {{ ($title === 'Artikel') ? 'fw-bold' : '' }}" aria-current="page" href="/artikel">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white {{ ($title === 'Kompetisi') ? 'fw-bold' : '' }}" aria-current="page" href="/kompetisi">Kompetisi</a>
          </li>
        </ul>
        {{-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline btn btn-secondary">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline btn btn-dark mx-2">Log in</a>
        @endauth
      </div>
    </div>
  </nav>