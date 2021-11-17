@extends('layouts.front')

@section('content')
  <section class="content-header">
  </section>

  <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Abertura de Ordem de Serviço</h3>       
        </div>

        <div class="card-body">
          <div class="card  mt-1 p-3">
            <form action="{{ route('os.create')}}" action="GET">
              <div class="input-group">
                 <input class="form-control " type="search"  placeholder="Buscar Cliente" aria-label="Search" name="search">
                 <div class="input-group-append">
                 <button class="btn btn-secondary" type="submit">Pesquisar<i class="fas fa-search px-2"></i></button>
                 <a href="{{route('os.create')}}" class="btn btn-success"><i class="fas fa-eraser px-2"></i>Limpar</a>
              </div>   
            </form>
          </div>

          <div class="mt-4">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nome do Cliente</th>
                  <th>Telefone</th>
                  <th>Celular</th>
                  <th style="width: 220px">Ações</th>
                </tr>
              </thead>

              <tbody>
              @foreach($customers as $customer)
                <tr>
                  <td>{{$customer->id}}</td>
                  <td>
                    <h5>{{$customer->fullname}}
                      @if($customer->active == 0)<span class="badge bg-danger">Inativo</span>@else<span class="badge bg-success">Ativo</span>@endif
                    </h5>
                  </td>
                  <td>{{$customer->phone}}</td>
                  <td>{{$customer->cellphone}}</td>
                  <td>
                    <div class="btn-group">
                        <form action="{{route('os.store', ['customer_id' => $customer->id])}}"  method="post">
                          @csrf
                          <input type="hidden" name="created_user_id" value="{{auth()->user()->id}}">
                          <button type="submit" class="btn btn-success" onclick="return confirm('Deseja Realmente Abrir a Ordem de Serviço Para Este Cliente?')">SELECIONAR CLIENTE</button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div> 
        </div>

        @if($customers->hasPages())
          <div class="card-footer clearfix">
            <ul class="pagination pagination m-0 float-right">
            {{$customers->links()}}
            </ul>
          </div>
        @endif
    </div>
  </section>
@endsection