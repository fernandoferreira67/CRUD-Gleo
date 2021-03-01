@extends('layouts.front')

@section('content')
<!--Inicio do Template-->
<section class="content-header">

    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin:50px;">
              
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $dashboard['customers'] }}</h3>
                            <p class="text-uppercase font-weight-bold">Total de Clientes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('customers.index') }}" class="small-box-footer">Acessar Cadastro de Clientes <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
          
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $dashboard['orders_pending'] }}</h3>
                            <p class="text-uppercase font-weight-bold">O.S Pendentes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file"></i>
                        </div>
                        <a href="{{ route('os.search.custom',['status' => '2']) }}" class="small-box-footer">Ver Ordens de Serviços <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
        
                <div class="col-lg-3 col-6">
                     <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $dashboard['orders_finished'] }}</h3>
                            <p class="text-uppercase font-weight-bold">O.S Finalizadas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-copy"></i>
                        </div>
                        <a href="{{ route('os.search.custom',['status' => '1']) }}" class="small-box-footer">Ver Ordens de Serviços  <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
      
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $dashboard['orders_pending_payment'] }}</h3>

                            <p class="text-uppercase font-weight-bold">O.S Aguardando Pagamento</p>
                            
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                        <a href="{{ route('os.search.custom',['status' => '4']) }}" class="small-box-footer">Ver Ordens de Serviços <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>


        </div>

        <div class="card-body" style="margin:50px;">
            <div class="text-center">
            <h3>Olá <b>{{ auth()->user()->name }}</b>, Seja Bem Vindo!</h3>          
            </div>
        </div>
    </section>

</section>
@endsection