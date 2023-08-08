<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Inicio de sesión - Vinculamos</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/reset.password.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/estilos.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href={{ '/img/logo_chico.png' }} />
    {{-- Logito de la pestaña --}}

</head>

<body
    style=" background-color: #515151;border-color: #515151; background:  url({{ asset('/img/fonologin.jpg') }})    ;background-size:cover; background-repeat:repeat;background-attachment: fixed;background-position: center;">
    <section class="ftco-section" style="margin-right: 1%; display: flex; align-items:center;">
        <div class="container" style="background: rgba(255,255,255,0.50);  border-radius: 50px; width:500px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center" style="border-radius: 50px; margin: 0 auto;">
                        <img src={{ '/img/logoleones.png' }} alt="Imagen" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row mt-4" style="background-color:; width:100%;  margin-left: 0%;">
                <div class="col-md-10 offset-md-3" style="background-color:;margin: 0 auto;">
                    <!-- <div style=" color:black;">{{ __('Reset Password') }}</div> -->
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('forget.password.post') }}">
                            @csrf

                            <div class="form-group">
                                <label class="label" for="email">{{ __('Correo') }}</label>
                                <input style="background-color:white; color:black; border: 1px solid #042344;"
                                    id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button style="background-color:#e76800; color:white;margin-top:5%;" type="submit"
                                    class="form-control btn rounded submit px-3">
                                    {{ __('Restablecer contraseña') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/popper.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>
