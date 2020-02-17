<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/login/style.css') }}">
</head>

<body>
    <form action=" {{ route('login.do') }} " method="post" id="formLogin">
        @csrf
        <div class="container login-container">
            <div class="row">
                <div class="col login-form-1">
                    <h3>Sys Cobrança</h3>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }}
                        <br>
                        @endforeach
                    </div>
                    @endif

                    <div id="errorFront" ></div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="user" id="user" placeholder="Usuário"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Senha"/>
                    </div>
                    <div class="form-group">
                        <input type="button" class="btnSubmit" value="Entrar" onclick="validation()" />
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/validations/login.js') }}"></script>
</body>

</html>