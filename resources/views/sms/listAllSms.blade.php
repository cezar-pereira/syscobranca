@extends('master.layout')

@section('title')
<h1 class="h2">Lista de sms</h1>
@endsection

@section('content')
<table class="table table-sm">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Mensagem</th>
            <th scope="col">Data / hora</th>
            <th scope="col">Destinatário</th>
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
            <td style="width: 25%">
                <div class="row">
                    <div class="col-7">
                        <b>Nome:</b> <a href="/user/{{$sms->user->id}}">{{$sms->user->name}}</a>
                    </div>
                    <div class="col-5">
                        <b>Contato:</b> <a href="/user/{{$sms->user->id}}">{{$sms->user->phone}}</a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $smss->links() }}

@endsection