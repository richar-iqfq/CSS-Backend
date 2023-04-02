{{-- <x-layouts.app title="About" :sum="2 + 2"> --}}
    
    {{-- <x-slot name='title'>
        About
    </x-slot> --}}

    {{-- <x-slot name='metaDescription'> About Page </x-slot>

    <h1>About Us</h1>
    <br>
    We are the best team on the world
</x-layouts.app> --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Acerca de nosotros</title>
    <link
      rel="icon"
      href="{{ asset('img/50cc9ad5-e8bd-47e3-9866-27ed8230e325.jfif') }}"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>

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
            <a class="nav-link active" aria-current="page" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Nosotros</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Inicia Cuerpo -->
  <body>
    <section class="fullscreen">
      <div class="item">
        <h1>
          Nuestra <span class="palabra-resaltada">mision</span> es lorem ipsum
          dolor sit amet, consectetur adipiscing elit. Pellentesque quam augue,
          placerat eu lorem a
        </h1>
      </div>
      <div class="image-item">
        <img class='home-image' src="{{ asset('img/horizontal placeholder image.png') }}"/>
      </div>
      <div class="color-item">
        <a
        type="button "
        class="btn main-buttons"
        href="#quienes-somos"
        >Quienes somos</a
      >
      <a
        type="button "
        class="btn main-buttons"
        href="#quienes-somos"
        >Productos</a
      >
      <a
        type="button"
        class="btn main-buttons"
        href="#quienes-somos"
        >Nuestro equipo</a
      >
      </div>
      <div class="item">
        <h1>
          Nuestra <span class="palabra-resaltada">vision</span> es lorem ipsum
          dolor sit amet, consectetur adipiscing elit. Pellentesque quam augue,
          placerat eu lorem a
        </h1>
      </div>
    </section>

    
   

    <section id="quienes-somos">
        <h2>¿Quienes somos?</h2>      
    </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
      crossorigin="anonymous"
    ></script>
  </body>
</html>