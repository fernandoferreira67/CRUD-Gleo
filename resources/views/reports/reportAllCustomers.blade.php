<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Todos os Clientes</title>   
<style type="text/css">

@page {
	margin: 0.8cm;
}

body {
  font-family: sans-serif;
  font-size: 12px;
  margin: 0.5cm 0;
  text-align: justify;
}
table h1 {
  font-size: 14px;
}
#header,
#footer {
  position: fixed;
  left: 0;
  right: 0;
  color: #1C1C1C;
  font-size: 0.9em;
  text-transform: uppercase;
}

#header {
  top: 0;
  border-bottom: 0.1pt solid #aaa;
}

#footer {
  bottom: 0;
  border-top: 0.1pt solid #aaa;
}

#header table,
#footer table {
	width: 100%;
	border-collapse: collapse;
	border: none;
}

#header td,
#footer td {
  padding: 0;
	width: 50%;
}

.page-number {
  text-align: center;
}

.page-number:before {
  content: "Pagina " counter(page);
}

hr {
  page-break-after: always;
  border: 0;
}

th,td {
  padding: 3pt;
}

table.separate {
  margin-top:18pt;
}

table.separate td {
    border: 0.5pt solid #ccc;
}

table.collapse {
  border-collapse: collapse;
  border: 1pt dashed black;  
}

table.collapse td {
  border: 1pt dashed black;
}

</style>
</head>


<body>
    <div id="header">
    <table>
        <tr>
        <td><h1>Relatório - Todos os Clientes Ativo<h1></td>
        </tr>
    </table>
    </div>


    <table cellpadding="5px" cellspacing="0" width="100%" class="separate"> 
        <thead style="background-color:#aaa" >
            <tr>
                <td>Nº</td>
                <td>Nome</td>
                <td>Telefone</td>
                <td>Celular</td>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $key)
            <tr>
                <td>{{$key->id}}</td>
                <td>{{$key->fullname}}</td>
                <td>{{$key->phone}}</td>
                <td>{{$key->cellphone}}</td>
            </tr>
            @endforeach	
        </tbody>
    </table>

    <div id="footer">
    <div class="page-number"></div>
    </div>

</body>
</html>
