@extends('layouts.front')

@section('content')
 <!--Inicio do Template-->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
                 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Clientes</h3>

          <div class ="card-tools ">
           <a href="{{route('customers.create')}}" class="btn btn-success">Adicionar Novo Cliente</a>   
          </div>   
          
        </div>

        <div class="card-body">
        <div class="card">      
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nome do Cliente</th>
                      <th>Telefone</th>
                      <th>Celular</th>
                      <th style="width: 220px">Label</th>
                    </tr>
                  </thead>

                  <tbody>
                  @foreach($customers as $customer)
                    <tr>
                      <td>{{$customer->id}}</td>
                      <td>{{$customer->fullname}}</td>
                      <td>{{$customer->phone}}</td>
                      <td>{{$customer->phone}}</td>
                      <td>
                   
                          <div class="btn-group">
                          <a href="{{route('customers.edit', ['customer' => $customer->id])}}"><span class="btn btn-primary btn-sm">EDITAR</span></a>
                            
                          <form action="{{route('customers.destroy', ['customer' => $customer->id])}}" method="post">
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
                {{$customers->links()}}
                </ul>
        </div>
       
      </div>
      

    </section>
@endsection