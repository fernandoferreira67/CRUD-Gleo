@extends('layouts.front')

@section('content')
    <section class="content-header">
    </section>

    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Cadastro de Usuário</h3>       
        </div>

        <div class="card-body">
            <form action="{{route('admin.settings.users.store')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="card-body">       
                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <label for="Name">Nome Completo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome Completo" value="{{old('name')}}">
                          @error('name')<div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-10">
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                          @error('email')<div class="invalid-feedback">{{$message}}</div> @enderror  
                      </div>
                    </div>
                  
                 </div>
                  


                  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                        <label>Usuário</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="" value="{{old('username')}}">
                        @error('username')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}">
                          @error('password')<div class="invalid-feedback">{{$message}}</div> @enderror  
                        </div>
                    </div>
                    <div class="col-2">    
                      <div class="form-group">
                        <label class="">Nivel</label>
                        <select class="form-control" name="level"> 
                          <option value="admin">Administrador</option>
                          <option value="user">Usuário</option>
                        </select>
                      </div>
                    </div>
                  </div>
        
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                      <button type="submit" class="btn btn-lg btn-primary">Cadastrar</button>
                    </div>
                  </div>

              </form>
        </div>
       
      </div>
      

    </section>
@endsection