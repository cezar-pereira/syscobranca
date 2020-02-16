@extends('master.layout')
@section('title')
<h2>Dados do cliente</h2>
@endsection
@section('content')

<div class="card" style="width: fit-content">
    <div class="card-body">
        <table>
            <tr>
                <td>
                    <h6>Nome:</h6>
                </td>
                <td>
                    <h6 style="font-weight: normal">{{$user->name}}</h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Contato:</h6>
                </td>
                <td>
                    <h6 style="font-weight: normal">{{$user->phone}}</h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>CPF:</h6>
                </td>
                <td>
                    <h6 style="font-weight: normal">{{$user->cpf}}</h6>
                </td>
            </tr>
        </table>
    </div>
    
</div>
<br>
<table>
    <tr>
        <td><a href="/sms/{{$user->id}}/create" style="margin-right: 1%;"><button type="button" class="btn btn-success btn-sm">Enviar sms</button></a></td>
        <td><a href="/user/{{$user->id}}/edit" style="margin-right: 1%;"><button type="button" class="btn btn-primary btn-sm">Editar</button></a></td>
        <td><form action=" {{ route('user.destroy', ['user' => $user->id]) }} " method="post" style="margin-right: 1%;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                    </form></td>
    </tr>
</table>
@if($smss->isNotEmpty())
<h2 style="margin-top: 1%;">Lista de sms</h2>
<table class="table table-sm">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Mensagem</th>
            <th scope="col">Data / hora</th>

        </tr>
    </thead>
    <tbody>
        @foreach($smss as $sms)
        <tr>
            <th style="width: 65%" scope="row">
                <div class="form-group">
                    <input class="form-control" id="exampleFormControlTextarea3" rows="1" readonly value="{{$sms->message}}">
                </div>
            </th>
            <td style="width: 10%">{{$sms->date}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $smss->links() }}
@endif

@if($paymentSlips->isNotEmpty())
<h2>Lista de boletos</h2>
<table class="table table-sm">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Descrição</th>
            <th scope="col">Data de vencimento</th>
            <th scope="col">Valor bruto</th>
            <th scope="col">Valor liquído</th>

        </tr>
    </thead>
    <tbody>
        @foreach($paymentSlips as $paymentSlip)
        <tr>
            <td>{{$paymentSlip->details}}</td>
            <td>{{$paymentSlip->dueDate}}</td>
            <td>{{$paymentSlip->grossIncome}}</td>
            <td>{{$paymentSlip->netIncome}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
{{ $paymentSlips->links() }}
@endif

@endsection('content')