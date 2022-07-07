@extends('layouts.front')

@section('content')

<section class="content-header">
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Relatório Personalizado</h3>
    </div>

    <div class="card-body">         
      <div class="card my-2 p-3">
        <form action="{{route('admin.reports.custom')}}" method="post" target="_blank">
          <div class="row">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group col-md-3">
              <label class="">Tipo de Relátorio</label>
              <select class="form-control" name="status"> 
                <option  value="1">Encerrada</option>
                <option  value="2">Pendente</option>
                <option  value="3">Em Andamento</option>
                <option  value="4">Aguardando Pagamento</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label class="">Periodo Inicial</label>
              <input type="date" class="form-control" name="date_init" required> 
            </div>  

            <div class="form-group col-md-3">
              <label class="">Periodo Final</label>
              <input type="date" class="form-control" name="date_end" required> 
            </div>

            <div class="col-md-3 pt-2 d-flex justify-content-start align-items-center">
              <button type="submit" class="btn btn-success">Gerar Relatório</button>
            </div>

          </div>
        </form>
       
      </div>
    </div>

</section>

@endsection