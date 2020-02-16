@extends('master.layout')

@section('title')
<h1 class="h2">Cadastrar boleto</h1>
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{$error}}
    <br>
    @endforeach
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div id="errorValidationFront">
</div>

<form action="{{route('paymentslip.store')}}" method="post" id="formPaymentSlip" >
    @csrf
    <div class="form-group row">
        <select class="col-sm-2 col-form-label" name="optionCpfPhone">
            <option {{ old("optionCpfPhone") === "Telefone" ? "selected":"" }}>Telefone</option>
            <option {{ old("optionCpfPhone") === "CPF" ? "selected":"" }}>CPF</option>
        </select>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="cpf_phone" id="cpf_phone" placeholder="Destinatário" required value="{{ !empty($user) ? $user->phone : old('cpf_phone') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Data do vencimento</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control" type="date" name="dueDate" id="dueDate" required value="{{ old('dueDate') }}">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Valor</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control" type="number" name="grossIncome" id="grossIncome" placeholder="Valor bruto" required value="{{ old('grossIncome') }}">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Detalhes</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control" type="text" maxlength="255" name="details" id="details" placeholder="Detalhes" required value="{{ old('details') }}">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="'button" class="btn btn-primary" onclick="validatorPaymentSlip()">Cadastrar boleto</button>
        </div>
    </div>
</form>
@endsection