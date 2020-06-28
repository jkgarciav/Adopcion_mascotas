
    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Business Casual - Start Bootstrap Theme</title>

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
            </ul>
        </div>
    </div>
</nav>

<section class="page-section cta">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="cta-inner text-center rounded">
                    <h2 class="section-heading mb-5">
                        <span class="section-heading-upper">!!  HOLA  !!</span>
                        <span class="section-heading-lower">MI NOMBRE ES {{$mascota->nombre}}!!!</span>
                    </h2>
                    <div class="card" style="width:available;" >
                        <img src="{{asset('imagenes/' . $mascota->foto)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Un poco mas sobre mi. Soy  {{$mascota->descripcion}}</p>
                        </div>
                        <ul class="list-unstyled  mb-8 text-left ">
                            <li class="list-group-item">Soy de color : {{$mascota->color}} </li>
                            <li class="list-group-item"> Tengo :{{$mascota->getEdad()}} aproximadamente. </li>
                            <li class="list-group-item"> Mi sexo es : {{$mascota->getSexo()}} </li>
                            <li class="list-group-item">Soy de tamaño : {{$mascota->getTamaño()}} </li>
                        </ul>
                        <a href="{{ url('/mascotas/form', ['id' => $mascota->id]) }}" class="btn btn-primary">!!!ADOPTAME!!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section about-heading">
    <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/about.jpg" alt="">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-lower">Para tener en cuenta ...</span>
                        </h2>
                        <p>Los perros, a diferencia de los gatos, suelen ser mascotas extremadamente dependientes. Buscan el apego emocional constante, y requieren de la atención humana para desarrollar sus principales rutinas. Si tu nivel de implicación no se adecúa a sus necesidades, tu perro podrá sentirse triste y frustrado, llegando incluso a desarrollar actitudes depresivas. Cuando la decisión de adoptar un perro va asociada a la adquisición de un cachorro las consecuencias pueden ser aún peores, ya que deberás invertir grandes dosis de tiempo y paciencia durante sus primeros meses de vida.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="footer text-faded text-center py-5">
    <div class="container">
    </div>
</footer>

</body>

</html>


