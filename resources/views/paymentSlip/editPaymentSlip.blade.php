@extends('master.layout')

@section('title')
<h1 class="h2">Editar boleto</h1>
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

<form action="{{route('paymentslip.update', ['paymentslip' => $paymentSlip->id])}}" method="post" id="formPaymentSlip">
    @csrf
    @method('PUT')
    <div class="form-group row container">
        <div class="card" style="width: fit-content">
            <div class="card-header">
                Dados do proprietário
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td>
                            <h6>Nome:</h6>
                        </td>
                        <td>
                            <h6 style="font-weight: normal">{{$paymentSlip->user->name}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6>Contato:</h6>
                        </td>
                        <td>
                            <h6 style="font-weight: normal">{{$paymentSlip->user->phone}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6>CPF:</h6>
                        </td>
                        <td>
                            <h6 style="font-weight: normal">{{$paymentSlip->user->cpf}}</h6>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Data do vencimento</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control" type="date" name="dueDate" id="dueDate" required value="{{ old('date') ? old('date') : $paymentSlip->dueDate }}">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Valor</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control" type="number" name="grossIncome" id="grossIncome" placeholder="Valor bruto" required value="{{ old('grossIncome') ? old('grossIncome') : $paymentSlip->grossIncome }}">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Detalhes</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control" type="text" maxlength="255" name="details" id="details" placeholder="Detalhes" required value="{{ old('details') ? old('details') : $paymentSlip->details }}">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="button" class="btn btn-primary" onclick="validatorPaymentSlip()">Editar boleto</button>
        </div>
    </div>
</form>
@endsection