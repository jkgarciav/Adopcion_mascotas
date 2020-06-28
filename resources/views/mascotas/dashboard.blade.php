<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/business-casual.min.css') }}" rel="stylesheet">

</head>

<body>

<h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-lower">MODULO MASCOTAS</span>
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
                    <form action="{{route('mascotas.create')}}" method="POST">
                        @csrf
                        @method('GET')
                        <button class="btn btn-primary" type="submit">Crear registro</button>
                    </form>
                </li>
                <li class="nav-item px-lg-4">
                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit">Cerrar cesion</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="page-section cta">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="container text-center rounded">
                    <h2 class="section-heading mb-5">
                        <span class="section-heading-upper">Este espacio permitira realizar modificaciones, adicion o eliminacion de registros para mascotas:</span>
                    </h2>

                    <table class="table table-hover table-dark">
                        <thead class="thead">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>ESTADO</th>
                            <th>EDITAR</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mascotas as $mascota)
                            <tr>
                                <td>{{ $mascota->id }}</td>
                                <td>{{ $mascota->nombre }}</td>
                                <td>{{ $mascota->estado  }}</td>
                                <td>
                                    <a href="{{route('mascotas.edit',$mascota->id)}}" ><img src={{ asset('img/iconmonstr-pencil-8-48.png') }} ></a>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('mascotas.historial',['mascotaId' => $mascota->id])}}">Historial</a>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('adoptantes.index',['mascotaId' => $mascota->id])}}">Adoptantes</a>
                                </td>
                                <td>
                                    @if($mascota->estado == 'Disponible' )
                                        <form action="{{route('mascotas.destroy',$mascota->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Eliminar registro</button>
                                        </form>
                                        @endif
                                </td>
                                @if($mascota->estado == 'Adoptado')
                                    <td>
                                        <a class="btn btn-warning" href="{{route('mascotas.notas.edit', $mascota->id)}}">Devolucion</a>
                                    </td>
                                @endif
                                @if($mascota->estado == 'Devuelto')
                                    <td>
                                        <a class="btn btn-warning" href="{{route('mascotas.regreso', $mascota->id)}}">Volver a Disponible</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

