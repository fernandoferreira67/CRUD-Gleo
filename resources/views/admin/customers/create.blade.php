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
            <form>
                <div class="card-body">
                 
                  <div class="row">
                    <div class="col-7">
                      <div class="form-group">
                        <label for="inputName">Nome Completo</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Nome Completo">
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputCpf">CPF</label>
                        <input type="text" class="form-control" id="inputCpf" placeholder="Digite os Apenas Números">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputRg">RG</label>
                        <input type="text" class="form-control" id="inputRg" placeholder="Digite os Apenas Números">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-7">
                      <div class="form-group">
                        <label for="inputEndereco">Endereço de Correspondência</label>
                        <input type="text" class="form-control" id="inputEndereco" placeholder="Comece com Rua, Av ou Alameda...">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputBairro">Bairro</label>
                        <input type="text" class="form-control" id="inputBairro" placeholder="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputCep">CEP</label>
                        <input type="text" class="form-control" id="inputCep" placeholder="Digite os Apenas Números">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="inputCidade">Cidade</label>
                        <input type="text" class="form-control" id="inputCidade" placeholder="Entre com nome da Cidade">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                        <label for="inputPhone">Telefone</label>
                        <input type="text" class="form-control" id="inputPhone" placeholder="Telefone Principal">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                        <label for="inputCellphone">Celular</label>
                        <input type="text" class="form-control" id="inputCellphone" placeholder="Celular ou Whatsapp">
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>Observação</label>
                        <textarea class="form-control" rows="3" placeholder="Observações..."></textarea>
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