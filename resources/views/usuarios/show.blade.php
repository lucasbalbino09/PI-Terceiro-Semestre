@extends('layout.app')
    @section('main')

    <div class="principal-poy">
      <h1>Nome de Usuário: {{$user->USUARIO_NOME}}</h1>
      <h1>Email: {{$user->USUARIO_EMAIL}}</h1>
      <h1>CPF: {{$user->USUARIO_CPF}}</h1>
        <div class="editar">
          <a href="{{route('usuarios.edit',['user'=>$user->USUARIO_ID])}} "  class="btn btn-dark" role="button">Editar</a></td>
        </div>
        
      <div class="voltar">
        <a href="/">
          <button type="submit" class="btn btn-danger">Voltar</button>
        </a>
      </div>
    </div>
@endsection
