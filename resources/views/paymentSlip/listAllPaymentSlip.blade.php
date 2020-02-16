@extends('master.layout')

@section('title')
<h1 class="h2">Lista de boletos</h1>
@endsection

@section('content')
<table class="table table-sm">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Descrição</th>
            <th scope="col">Data de vencimento</th>
            <th scope="col">Valor bruto</th>
            <th scope="col">Valor liquído</th>
            <th scope="col">Responsável</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paymentSlips as $paymentSlip)
        <tr>
            <td style="width: 45%">{{$paymentSlip->details}}</td>
            <td style="width: 10%">{{$paymentSlip->dueDate}}</td>
            <td style="width: 7%">{{$paymentSlip->grossIncome}}</td>
            <td style="width: 7%">{{$paymentSlip->netIncome}}</td>
            <td style="width: 20%">
                <div class="row">
                    <div class="col-7">
                        <b>Nome:</b> <a href="/user/{{$paymentSlip->user->id}}">{{$paymentSlip->user->name}}</a>
                    </div>
                    <div class="col-5">
                        <b>Contato:</b> <a href="/user/{{$paymentSlip->user->id}}">{{$paymentSlip->user->phone}}</a>
                    </div>
                </div>
            </td>
            <td style="width: 10%">
            <div class="row"> 
                <a href="/paymentslip/{{$paymentSlip->id}}/edit" style="margin-right: 1%;"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
                <form action=" {{ route('paymentslip.destroy', ['paymentslip' => $paymentSlip->id]) }} " method="post" style="margin-right: 1%;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $paymentSlips->links() }}
@endsection