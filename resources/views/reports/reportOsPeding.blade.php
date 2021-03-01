<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>   
    <style>
    .page-break {
    page-break-after: always;
    }
    h1 {
        font-size:12px;
    }
     /*css global tabela*/
     .full_table_list{width: 200px;border-collapse: collapse;}
         
    /*colocando bordas nas linhas*/
    .full_table_list tr{border:1px black solid;}
         
         /*Definido cor das linhas pares*/
         .full_table_list tr:nth-child(even) {background: #FFF}
          
         /*Definindo cor das Linhas impáres*/
         .full_table_list tr:nth-child(odd) {background: #EEE}   
</style> 
</head>
<body class="page-break">
<h1>Relatório de Ordens de Serviço Pendente</h1>



<table width="100%"> 
    <thead >
	    <tr>
			<td>OS</td>
			<td>Nome</td>
			<td>Abertura da OS</td>
            <td>Status</td>
		</tr>
	</thead>
    <tbody>
        @foreach($os as $key)
		<tr>
            <td>{{$key->id}}</td>
            <td>{{$key->customer->fullname}}</td>
            <td>{{$key->created_at}}</td>
            <td>{{$key->created_at}}</td>
		</tr>
        @endforeach	
    </tbody>
</table>
</body>
</html>
