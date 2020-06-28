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
                        <span class="section-heading-upper">Diligenciar los datos en su totalidad todos son campos  requeridos para realizar correctamente el registro :</span>
                    </h2>
                    <form action="/mascotas" enctype="multipart/form-data"  method="POST" class="container col-sm-10">

                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nombre mascota</label>
                            <input type="text" class="form-control" name="nombre" id="exampleFormControlInput1" placeholder="Nombre de la mascota">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Color</label>
                            <input type="text" class="form-control" name="color"id="exampleFormControlInput1" placeholder="Color predominante en la mascota">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Edad</label>
                            <select class="form-control" name="edad" id="exampleFormControlSelect1">
                                <option> -- Seleccionar edad --</option>
                                @foreach($edades as $edad)
                                    <option value="{{$edad->id}}">{{$edad->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Especie</label>
                            <select class="form-control" name="especie" id="exampleFormControlSelect1">
                                <option> -- Seleccionar especie --</option>
                                @foreach($especies as $especie)
                                    <option value="{{$especie->id}}">{{$especie->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tamaño</label>
                            <select class="form-control" name="tamaño" id="exampleFormControlSelect1">
                                <option> -- Seleccionar tamaño --</option>
                                @foreach($tamaños as $tamaño)
                                    <option value="{{$tamaño->id}}">{{$tamaño->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Sexo</label>
                            <select class="form-control" name="sexo" id="exampleFormControlSelect1">
                                <option> -- Seleccionar sexo --</option>
                                @foreach($sexos as $sexo)
                                    <option value="{{$sexo->id}}">{{$sexo->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Fotografia de mascota</label>
                            <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
                        </div>
                        <button type="submit" class="btn btn-dark">Guardar Registro Mascota</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
