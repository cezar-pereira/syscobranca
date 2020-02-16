@extends('master.layout')

@section('title')
<h1 class="h2">Enviar sms</h1>
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{$error}}
    @endforeach
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{route('sms.store')}}" method="post">
    @csrf
    <div class="form-group row">
        <select class="col-sm-2 col-form-label" name="optionCpfPhone">
            <option {{ old("optionCpfPhone") === "Telefone" ? "selected":"" }}>Telefone</option>
            <option {{ old("optionCpfPhone") === "CPF" ? "selected":"" }}>CPF</option>
        </select>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="cpf_phone" placeholder="Destinatário" required value="{{ !empty($user) ? $user->phone : old('cpf_phone') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Mensagem</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control" type="text" maxlength="160" rows="3" name="message" placeholder="Mensagem" required value="{{ old('message') }}">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
@endsection