<!-- resources/views/vehicles/report_pdf.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Vehículos</title>
    <style>
        /* Estilos para el PDF */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Informe de Vehículos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Nombre Completo del Propietario</th>
                <th>Color</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->marca }}</td>
                    <td>{{ $vehicle->owner->primer_nombre }} {{ $vehicle->owner->segundo_nombre ?? '' }} {{ $vehicle->owner->apellidos }}</td>
                    <td>{{ $vehicle->color }}</td>
                    <td>{{ ucfirst($vehicle->tipo) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
