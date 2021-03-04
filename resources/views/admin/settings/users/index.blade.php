@extends('layouts.front')

@section('content')
 <!--Inicio do Template-->
 <section class="content-header">
 </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Usuários</h3>

          <div class ="card-tools ">
           <a href="{{route('admin.settings.users.create')}}" class="btn btn-success">Adicionar Novo Usuário</a>   
          </div>   
          
        </div>

        <div class="card">      
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nome</th>
                      <th>Usuário</th>
                      <th>Criado em</th>
                      <th style="width: 220px">Ações</th>
                    </tr>
                  </thead>

                  <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->username}}</td>
                      <td>{{$user->created_at->format('d/m/Y H:i')}}</td>
                      <td>
                          <div class="btn-group">
                          <a href="{{route('admin.settings.users.edit', ['user' => $user->id])}}"><span class="btn btn-primary btn-sm">EDITAR</span></a>
                          </div>
                      </td>
                    </tr>
                  @endforeach
            
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

        </div>

        
       
      </div>
      

    </section>
@endsection