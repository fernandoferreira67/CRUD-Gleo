@extends('layouts.front')

@section('content')
 <!--Inicio do Template-->
 <section class="content-header">
 </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
      <div class="card-header">
          <h3 class="card-title">Ordens de Serviço</h3>

          <div class ="card-tools ">
           <a href="{{route('os.create')}}" class="btn btn-success">Abrir Ordem de Serviço</a>   
          </div>   
          
        </div>

        <div class="card-body">
        <div class="card">      
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width: 10px">OS</th>
                      <th>Cliente</th>
                      <th>Telefone</th>
                      <th>Aberto</th>
                      <th style="width: 220px">Ações</th>
                    </tr>
                  </thead>

                  <tbody>
                  @foreach($orderServices as $os)
                    <tr>
                      <td>{{$os->id}}</td>
                      <td>
                        <h5>{{$os->customer->fullname}}
                          @if($os->status == 1)<span class="badge bg-danger">Finalizada</span>@elseif($os->status == 2)<span class="badge bg-success">Pendente</span>@endif
                        </h5>
                      </td>
                      <td>{{$os->customer->phone}}</td>
                      <td>{{$os->created_at->format('d/m/Y H:i')}}</td>
                      <td>
                   
                          <div class="btn-group">
                          <a href="#"><span class="btn btn-primary btn-sm">EDITAR</span></a>
                            
                          <form action="#" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm">EXCLUIR</button>
                          </form>


                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

        </div>

        <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
               
                </ul>
        </div>
       
       
      </div>  

    </section>
@endsection