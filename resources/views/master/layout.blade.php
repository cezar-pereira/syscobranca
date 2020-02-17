<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('site/css/master/style.css') }}">
</head>

<body>

  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">Sys. Cobrança</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href=" {{ route('logout') }} ">Sair</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <!-- USUARIO -->
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>
              <h4>USUÁRIO</h4>
            </span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            </a>
          </h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ (Route::current()->getName() === 'user.create' ? 'active' : '' ) }} " href="{{ route('user.create') }}">
                <span data-feather="home">
                  Cadastrar usuário</span>
              </a>
            <li class="nav-item">
              <a class="nav-link {{ (Route::current()->getName() === 'user.index' ? 'active' : '' ) }} " href=" {{ route('user.index') }} ">
                <span data-feather="home">
                  Listar usuários</span>
              </a>
          </ul>

          <!-- SMS -->
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>
              <h4>SMS</h4>
            </span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            </a>
          </h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ (Route::current()->getName() === 'sms.create' ? 'active' : '' ) }}" href="{{ route('sms.create') }}">
                <span data-feather="home">
                  Envia sms</span>
              </a>
            <li class="nav-item">
              <a class="nav-link {{ (Route::current()->getName() === 'sms.index' ? 'active' : '' ) }}" href=" {{ route('sms.index') }} ">
                <span data-feather="home">
                  Listar sms</span>
              </a>
          </ul>

          <!-- BOLETOS -->
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>
              <h4>BOLETOS</h4>
            </span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            </a>
          </h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ (Route::current()->getName() === 'paymentslip.create' ? 'active' : '' ) }}" href="{{  route('paymentslip.create') }}">
                <span data-feather="home">
                  Cadastrar boleto</span>
              </a>
            <li class="nav-item">
              <a class="nav-link {{ Route::current()->getName() === 'paymentslip.index' ? 'active' : '' }}" href="{{  route('paymentslip.index') }}">
                <span data-feather="home">
                  Listar boletos</span>
              </a>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

          @yield('title')
        </div>
        <div class="my-4 w-100" width="900" height="380">
          @yield('content')
        </div>
      </main>
    </div>
  </div>

  <script src="{{ asset('site/jquery.js') }}"></script>
  <script src="{{ asset('site/bootstrap.js') }}"></script>
  <script src="{{ mix('site/validations/createEditUser.js') }}"></script>
  <script src="{{ mix('site/validations/createSms.js') }}"></script>
  <script src="{{ mix('site/validations/createEditPaymentSlip.js') }}"></script>

</body>

</html>