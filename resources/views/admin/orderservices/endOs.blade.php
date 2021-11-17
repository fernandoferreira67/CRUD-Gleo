@extends('layouts.front')

@section('content')
 <!--Inicio do Template-->
 <section class="content-header">
 </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body my-4">     
          <div class="d-flex justify-content-center">      
            <a href="{{ route('os.generatePrint',['id' => $id]) }}" target="_blank" class="btn btn-info btn-lg">Imprimir OS Finalizada</a>
            <a href="{{route('os.index')}}" class="ml-2 btn btn-success btn-lg">Voltar Para as Ordens de Serviço</a>   
          </div>
        </div>
      </div>  

  </section>
@endsection