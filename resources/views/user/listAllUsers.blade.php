@extends('master.layout')

@section('title')
<h1 class="h2">Lista de usuários</h1>
@endsection

@section('content')
<table class="table table-sm">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Contato</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th style="width: 35%" scope="row">{{$user->name}}</th>
            <td style="width: 20%">{{$user->cpf}}</td>
            <td style="width: 20%">{{$user->phone}}</td>
            <td style="width: 25%">
                <div class="row">

                    <a href="user/{{$user->id}}" style="margin-right: 1%;"><button type="button" class="btn btn-secondary btn-sm">Ver dados</button></a>
                    <a href="sms/{{$user->id}}/create" style="margin-right: 1%;"><button type="button" class="btn btn-success btn-sm">Enviar sms</button></a>
                    <a href="user/{{$user->id}}/edit" style="margin-right: 1%;"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
                    
                    <form action=" {{ route('user.destroy', ['user' => $user->id]) }} " method="post" style="margin-right: 1%;">
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
{{ $users->links() }}
@endsection