<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Registrar nuevo registro</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('/assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/bundles/jquery-selectric/selectric.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href={{-- '{{ asset('/img/aiep_chico.png') }}' --}} />
</head>

<body style="background: /* url({{ asset('/img/imagen1.jpg') }}) */;background-size:cover; background-repeat:repeat;background-attachment: fixed;background-position: center;">
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Registrar Nuevo Usuario</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('nuevo.registro') }}" method="POST">
                @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">Nombre</label>
                      <input id="frist_name" type="text" class="form-control" name="frist_name" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Apellido</label>
                      <input id="last_name" type="text" class="form-control" name="last_name">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">Nombre de Usuario</label>
                      <input id="frist_name" type="text" class="form-control" name="frist_name" autofocus>
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Correo Electronico</label>
                        <input id="email" type="email" class="form-control" name="email">
                        <div class="invalid-feedback">
                    </div>
                  </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Registrar
                    </button>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Ya se encuentra REGISTRADO? <a href="ingresar">INGRESAR</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('/assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('/assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('/assets/js/page/auth-register.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('/assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('/assets/js/custom.js') }}"></script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>
