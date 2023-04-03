{{-- <x-layouts.app title="About" :sum="2 + 2"> --}}
    
    {{-- <x-slot name='title'>
        About
    </x-slot> --}}

    {{-- <x-slot name='metaDescription'> About Page </x-slot>

    <h1>About Us</h1>
    <br>
    We are the best team on the world
</x-layouts.app> --}}
@extends('layouts.app')

@section('title', 'About')
@section('meta_description', 'Acerca de nosotros')

@section('content')
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
@endsection