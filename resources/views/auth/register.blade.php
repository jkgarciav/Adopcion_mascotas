<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href={{ asset('assets/bootstrap/css/bootstrap.css') }}>
    <link rel="stylesheet" href={{ asset('assets/font-awesome/css/font-awesome.css')}}>
    <link rel="stylesheet" href={{ asset('assets/css/form-elements.css')}}>
    <link rel="stylesheet" href={{ asset('assets/css/style.css')}}>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href={{ asset('assets/ico/favicon.png')}}>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href={{ asset('assets/ico/apple-touch-icon-144-precomposed.png')}}>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href={{ asset('assets/ico/apple-touch-icon-114-precomposed.png')}}>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href={{ asset('assets/ico/apple-touch-icon-72-precomposed.png')}}>
    <link rel="apple-touch-icon-precomposed" href={{ asset('assets/ico/apple-touch-icon-57-precomposed.png')}}>

</head>

<body>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>Registro Modulo Administrativo</strong></h1>
                    <div class="description">
                        <p>
                            Por este lugar podra registrar nuevos usuarios con rol administrador
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Ingrese los datos solicitados acontinuacion</h3>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre y apellido</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo electronico</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contraseña</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrarme
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Javascript -->
<script src={{ asset('assets/js/jquery-1.11.1.min.js')}}></script>
<script src={{ asset('assets/bootstrap/js/bootstrap.min.js')}}></script>
<script src={{ asset('assets/js/jquery.backstretch.min.js')}}></script>
<script src={{ asset('assets/js/scripts.js')}}></script>

<!--[if lt IE 10]>
<script src={{ asset('assets/js/placeholder.js')}}></script>
<![endif]-->

</body>
