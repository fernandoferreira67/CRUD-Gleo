<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de Serviço</title>
    
    <link rel="stylesheet"  type="text/css" href="{{ asset('css/print.css') }}">

</head>
<body>

<div id="folha-a4" class="folha a4_vertical">
   <div id="conteudo">
        <div class="company">
         <h1 class="center"> POLIPEDRAS </h1>
          <table style="width:100%">
            <td>
                <h4>POLIPEDRAS MARMORES E GRANITO</h4>
                <h4>CNPJ:01.571.186/0001-00</h4>
                <h4>Estrada Municipal José Bem Vindo Borsetto, 401</h4>
                <h4>Bairro Marimbondo</h4>
                <h4>Cep:14949-899</h4>
				<h4>(16)3342-3030 | Whatsapp:(16) 9.9624-1335</h4>
                <h4>Ibitinga/SP</h4>
            </td>

            <td style="text-align:center">
                <h2>OS</h2>
                <h3>Nº {{$os->id}}</h3>
            <h5>{{$os->created_at->format('d/m/Y h:m')}}</h5>
                <h6>Aberto pelo usuário:{{$os->createdUser->name}}</h6>
            </td>
          </table>

       </div>

        <div class="customer-main">
           <h3 class="center uppercase">Dados do Cliente</h3>
        </div>

        <div class="customer">
         <p>Cliente: {{$os->customer->fullname}} CPF/CNPJ: {{$os->customer->cpf}} RG/IE: {{$os->customer->rg}}</p>
         <p>Endereço: {{$os->customer->address}} -  {{$os->customer->district}}</p>
         <p>Telefone: {{$os->customer->phone}} Celular: {{$os->customer->cellphone}} </p>
         <p>CEP: {{$os->customer->cep}} Cidade: {{$os->customer->city}}
        </div>

        <div class="description-main">
          <h3 style="color:#333; text-align:center">Anotação</h3>
        </div>

        <div class="description">
            {{$os->description}}
        </div>

        <div class="solution-main">
          <h3 style="color:#333; text-align:center">Descrição</h3>
        </div>

        <div class="form-group">
              <textarea class="form-control" id="textarea" wrap="wrap" name="solution" rows="8" readonly>{{ $os->solution }}</textarea>
        </div> 
 
        <div class="price-main">
          <h3 style="color:#333; text-align:right">Total da Ordem de Serviço:<span id="price">R${{number_format($os->price, 2, ',', '.')}}<span> </h3>
        </div>

       
   </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>

<script>

    $(document).ready(function(){
      objTextArea = document.getElementById('textarea');
        while (objTextArea.scrollHeight > objTextArea.offsetHeight)
        {
            objTextArea.rows += 1;

        }
      //$('#textarea').autoResize();
        //window.print();
	
	  $(document).ready(function(){
        window.print();
	  });
        
 });
   
</script>  
</body>
</html>