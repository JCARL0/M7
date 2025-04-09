<!DOCTYPE html>
<html>
<head>
    <title>Usuarios con comanda</title>
</head>
<body>
    <h1>Usuarios con menos comanda</h1>
    <ul>
        @foreach($usuaris as $usuari)
            <li>{{ $usuari->nom }} — Comandas: {{ $usuari->total_comandes }}</li>
        @endforeach
    </ul>
</body>
</html>