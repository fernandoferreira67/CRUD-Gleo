<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Serviço</title>
</head>
<body>
    <h1>Ordens de Serviço em aberto</h1>
    @foreach($os as $item)
    <p><h4>OS:{{ $item->id }}->{{$item->customer->fullname}}</h4></p>
    @endforeach
</body>
</html>