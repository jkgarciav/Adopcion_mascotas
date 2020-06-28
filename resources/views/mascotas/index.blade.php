
@extends('layouts.app')
@section('title','listar mascota')
@section('content')
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mascotas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Casual - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">

</head>

<body>

<h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Instituto Distrital de Protección y Bienestar Animal</span>
    <span class="site-heading-lower">ADOPCIONES</span>
</h1>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="{{route('mascotas.index')}}">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="{{route('requisitos')}}">Requisitos</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="{{route('noticias')}}">Noticias</a>
                </li>
                @if(Auth::guest())
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="{{route('login')}}">LOGIN</a>
                    </li>
                @else
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="{{route('login')}}">ADMINISTRADOR</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<section class="page-section clearfix">
    <div class="container">
        <div class="intro">
            <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/adoptame.jpeg" alt="">
            <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                <h2 class="section-heading mb-4">
                    <span class="section-heading-upper">BIENVENIDOS !!!</span>
                    <span class="section-heading-lower">Adopciones animales de compañía</span>
                </h2>
                <p class="mb-3">El programa de adopciones es uno de los más importantes del Instituto Distrital de Protección y Bienestar Animal. A diario llegan a la Unidad de Cuidado Animal perros y gatos víctimas de maltrato o abandono, o atendidos por el equipo de Urgencias Veterinarias y el Escuadrón Anticrueldad.

                    Una vez finaliza su recuperación física, comportamental y emocional, los animales ingresan al programa de adopciones a la espera de encontrar una nueva familia responsable y amorosa.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="page-section cta">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="cta-inner text-center rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper">Aqui podras ver todos los animales que el Instituto tiene en adopción</span>
                        <span class="section-heading-lower">ciudadanos de 4 patas</span>
                    </h2>
                        <div class="row row-cols-md-3" >
                            @foreach($mascotas as $mascota)
                                @if($mascota->estado == 'Disponible' or $mascota->estado == 'En_Proceso')
                                    <div class="col-sm ">
                                        <div class="card text-center " style="width: 18rem; margin: 20px" >
                                            <img src="{{asset('imagenes/' . $mascota->foto)}}" margin="30px" class="card-img-top rounded-circle mz" alt="..." width="150" height="250" >
                                            <div class="card-body">
                                                <h5 class="card-title">{{$mascota->nombre}}</h5>
                                                <p class="card-text">{{$mascota->descripcion}}</p>
                                                <a href="{{ url('/mascotas', ['id' => $mascota->id]) }}" class="btn btn-primary">!! MAS SOBRE MI !!</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer text-faded text-center py-5">
    <div class="container">
        <p class="m-0 small">adopcion mascotas 2020</p>
    </div>
</footer>

</body>

</html>



