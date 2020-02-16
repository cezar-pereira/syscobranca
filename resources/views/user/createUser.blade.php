@extends('master.layout')

@section('title')
<h1 class="h2">Cadastrar usuário</h1>
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }}
    <br>
    @endforeach
</div>
@endif

<div id="errorValidationFront">
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<form action=" {{ route('user.store') }} " method="post" id="formUser">
    @csrf
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" min="2" class="form-control" placeholder="Nome completo" name="name" id="name" required="required" value="{{old('name')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">CPF</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="CPF" name="cpf" id="cpf" required="required" value="{{ old('cpf') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Contato</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="contato" name="phone" id="phone" name="phone" required="required" value="{{ old('phone') }}">
        </div>
    </div>
    <button class="btn btn-primary" type="button" onclick="validateUser()" >Cadastrar</button>
</form>

@endsection