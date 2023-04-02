@extends('layouts.app')

@section('title', 'Welcome')

@section('meta_description', 'Welcome to user')
    
@section('content')
    @if ($nickname)
        Bienvenido {{ $name }}, tu apodo es {{ $nickname }}
    @else
        Bienvenido {{ $name }} 
    @endif    
@endsection