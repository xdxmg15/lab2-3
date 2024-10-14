<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Medicamentos</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('medicamentos.index') }}>CRUD Medicamentos</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('medicamentos.create') }}>Add Medicamento</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
    <table class="table">
    <thead>
        <tr>
            <th>Nombre Medicamento</th>
            <th>Tipo Medicamento</th>
            <th>Cantidad Medicamento</th>
            <th>Distribuidor</th>
            <th>Sucursal</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($medicamentos as $medicamento)
            <tr>
                <td>{{ $medicamento->NombreMedicamento }}</td>
                <td>{{ $medicamento->TipoMedicamento }}</td>
                <td>{{ $medicamento->CantidadMedicamento }}</td>
                <td>{{ $medicamento->Distribuidor }}</td>
                <td>{{ $medicamento->Sucursal }}</td>
                <td>{{ $medicamento->Direccion }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
  </div>
</body>
</html>
