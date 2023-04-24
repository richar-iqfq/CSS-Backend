<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img
        src="{{ asset('img/50cc9ad5-e8bd-47e3-9866-27ed8230e325.jfif') }}"
        alt="Logo"
        width="30"
        height="30"
        class="d-inline-block align-text-top"
        style="margin-right: 5px;"
      />CSS</a
    >
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('about.index') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('users.index') }}">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('users.create') }}">Nuevo Usuario</a>
        </li>
        <li>
          <a class="nav-link active" href="{{ route('constants.index') }}">Constants</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  {{-- <nav>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="/usuarios">Lista de usuarios</a></li>
      <li><a href="/usuarios/nuevo">Nuevo Usuario</a></li>
    </ul>
  </nav> --}}