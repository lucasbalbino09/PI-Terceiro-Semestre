@extends('layout.app')
    @section('main')

    @if(session()->has('message'))
    {{session()->get('message')}}
@endif

        <div class="principal-typ">
            <form action="{{route('usuarios.update',['user'=>$user->USUARIO_ID])}}" method="post" >

                        @csrf

                            <h1>Editar Usuário</h1>

                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">

                                    <label for="exampleInputEmail1">Nome:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="USUARIO_NOME" value="{{$user->USUARIO_NOME}}" required>
                                    <small id="emailHelp" class="form-text text-muted" ></small>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email:</label>
                                    <input type="email" class="form-control" id="exampleInputPassword1" name="USUARIO_EMAIL" value="{{$user->USUARIO_EMAIL}}" required>
                                </div>
                                <div class="Editar">
                                    <button type="submit" class="btn btn-primary editar">Editar</button>
                                </div>

                              
                                    </div>
                        </form>
                        <div class="voltar">
                                    <a href="/">
                                        <button type="button" class="btn btn-danger">Voltar</button>
                                    </a>



                    </div>
                  </div>

            </div>
        </div>
    </div>
    </div>
</div>


    @endsection
