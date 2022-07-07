@extends('layouts.front')

@section('content')
 <!--Inicio do Template-->
 <section class="content-header">
 </section>

    <section class="content">

        <div class="card">      
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Informação da Ordem de Serviço</th>
                      <th>Data</th>
                      <th>Valor</th>
                      <th style="width: 220px">Ações</th>
                    </tr>
                  </thead>

                  <tbody>

                  @foreach($OSCustomer as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>
                        <h5>{{$value->customer->fullname}}</h5>
                        <h3> 
                          @if($value->status == 0)<span class="badge bg-danger">Cancelada</span>
                            @elseif($value->status == 1)<span class="badge bg-success">Encerrada</span>
                             @elseif($value->status == 2)<span class="badge bg-primary">Pendente</span>
                              @elseif($value->status == 3)<span class="badge bg-dark">Em Andamento</span>
                                @elseif($value->status == 4)<span class="badge bg-warning">Aguardando Pagamento</span>
                          @endif
                        </h3>
                      </td>
                      <td>{{$value->updated_at->format('d/m/Y H:i')}}</td>
                      <td>R$ {{number_format($value->price, 2, ',', '.')}}</td>
                      <td>
                        <div class="input-group-prepend ">
                          <a href="{{ route('os.edit',['orderService' => $value->id]) }}">
                            <span class="btn btn-primary btn-sm">Visualizar</span>
                          </a>

                          <button type="button" class="btn btn-success btn-sm dropdown-toggle ml-1" data-toggle="dropdown" aria-expanded="false">+ OPÇÕES</button>
                            <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
                              <li class="dropdown-item">
                                <a href="{{ route('os.generatePrint',['id' => $value->id]) }}" target="_blank">Imprimir OS</a>
                              </li>
                              @if($value->status >= 1  ) <li class="dropdown-item"><a href="{{ route('os.generatePrintFinished',['id' => $value->id]) }}"target="_blank">Imprimir Pedido </a></li> @endif
                            </ul>
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