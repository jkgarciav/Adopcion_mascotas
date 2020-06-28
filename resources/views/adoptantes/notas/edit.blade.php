<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registro mascota</title>

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
                    <a class="nav-link text-uppercase text-expanded" href="{{route('mascotas.dashboard')}}">Volver
                        <span class="sr-only">(current)</span>
                    </a>
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
            <div class="col-xl-9 mx-auto">
                <div class="cta-inner  rounded">
                    <h2 class="section-heading mb-5">
                        <span class="section-heading-upper">Diligenciar en este campo la valoracion realizada a el posible adoptante </span>
                    </h2>
                    <form action="{{route('adoptantes.notas.update', ['adoptanteId' => $adoptante->id, 'mascotaId' => $adoptante->mascota_id])}}" enctype="multipart/form-data"  method="POST" class="container col-sm-10">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Notas</label>
                            <textarea class="form-control" name="notas" id="exampleFormControlTextarea1" rows="3">{{$adoptante->notas}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-dark">Guardar Nota</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

