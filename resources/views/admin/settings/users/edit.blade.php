@extends('layouts.front')

@section('content')
    <section class="content-header">
    </section>

    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Alteração do Cadastro de Usuário</h3>       
        </div>

        <div class="card-body">
            <form action="{{ route('admin.settings.users.update', ['user' => $user->id])  }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            @method("PUT")

                <div class="card-body">      

                 <div class="row">
                    <div class="col-1">
                      <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{$user->id}}" readonly>
                      </div>
                    </div>

                    <div class="col-3">    
                      <div class="form-group">
                        <label class="">Situação do Cadastro</label>
                        <select class="form-control" name="active"> 
                          <option  value="1" {{ $user->active == 1 ? 'selected' : '' }} >Ativo</option>
                          <option  value="0" {{ $user->active == 0 ? 'selected' : '' }}>Inativo</option>
                        </select>
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <label for="Name">Nome Completo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome Completo" value="{{$user->name}}">
                          @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-10">
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
                          @error('email')<div class="invalid-feedback">{{$message}}</div> @enderror  
                      </div>
                    </div>
                  
                 </div>
                  


                  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                        <label>Usuário</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="" value="{{$user->username}}">
                        @error('username')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$user->password}}">
                          @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror  
                        </div>
                    </div>
                    <div class="col-2">    
                      <div class="form-group">
                        <label class="">Nivel</label>
                        <select class="form-control" name="level"> 
                          <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Administrador</option>
                          <option value="user" {{ $user->level == 'user' ? 'selected' : '' }}>Usuário</option>
                        </select>
                      </div>
                    </div>
                  </div>
        
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                      <button type="submit" class="btn btn-lg btn-primary">Alterar</button>
                    </div>
                  </div>

              </form>
        </div>
       
      </div>
      

    </section>
@endsection