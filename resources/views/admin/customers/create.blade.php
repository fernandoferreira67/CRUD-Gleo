@extends('layouts.front')

@section('content')
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
          <h3 class="card-title">Cadastro de Cliente</h3>       
        </div>

        <div class="card-body">

            <form action="{{route('customers.store')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="card-body">
                 
                  <div class="row">
                    <div class="col-8">
                      <div class="form-group">
                        <label for="inputName">Nome Completo</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Nome Completo">
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputCpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" data-inputmask="'mask': '999.999.999-99'" data-mask="" inputmode="text">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputRg">RG</label>
                        <input type="text" class="form-control" name="rg" placeholder="Apenas Números">
                        </div>
                    </div>
                  

                  <div class="col-2">
                  <div class="form-group">
                    <label>Telefone</label>
                      <div class="input-group">
                       <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" name="phone" class="form-control" data-inputmask="'mask': '(99)9999-9999'" data-mask="" inputmode="text">
                     </div>
                  </div>
                  </div>
                  
                  <div class="col-2">
                  <div class="form-group">
                    <label>Celular</label>
                      <div class="input-group">
                       <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                      </div>
                      <input type="text" name="cellphone" class="form-control" data-inputmask="'mask': '(99)99999-9999'" data-mask="" inputmode="text">
                     </div>
                  </div>
                  </div>
                </div><!--End 2 Plan-->

                  <div class="row">
                    <div class="col-8">
                      <div class="form-group">
                        <label for="inputEndereco">Endereço de Correspondência</label>
                        <input type="text" class="form-control" name="address" placeholder="Rua, Av ou Alameda...">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputBairro">Bairro</label>
                        <input type="text" class="form-control" name="district" placeholder="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputCep">CEP</label>
                        <input type="text" class="form-control" name="cep" data-inputmask="'mask': '99999-999'" data-mask="" inputmode="text">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="inputCidade">Cidade</label>
                        <input type="text" class="form-control" name="city" placeholder="Entre com nome da Cidade">
                        </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-8">
                      <div class="form-group">
                        <label>Observação</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Observações..."></textarea>
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