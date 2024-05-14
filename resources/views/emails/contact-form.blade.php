<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de contacto</title>
</head>
<body>
    <hr>

    <p>Ha recibido un mensaje desde su pagina web.</p>
    <hr>
    <p><strong>Nombre: </strong>{{$msg->name}} </p>
    <p><strong>Email: </strong>{{$msg->email}} </p>
    <p><strong>Telefono: </strong>{{$msg->phone}} </p>
    <p><strong>Mensaje: </strong>{{$msg->message}} </p>
</body>
</html>
