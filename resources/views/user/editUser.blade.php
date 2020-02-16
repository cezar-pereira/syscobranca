@extends('master.layout')

@section('title')
<h1 class="h2">Editar usuário</h1>
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action=" {{ route('user.update', ['user' => $user->id]) }} " method="post">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" min="2" class="form-control" value="{{ old('name') ? old('name') : $user->name }}" name="name" required="required">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">CPF</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" value="{{$user->cpf}}" name="cpf" required="required" readonly="readonly">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Contato</label>
        <div class="col-sm-10">
            <input type="tel" class="form-control" value="{{ old('phone') ? old('phone') : $user->phone }}" name="phone" maxlength="15" name="phone" required="required">
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Editar usuário</button>
</form>

@endsection