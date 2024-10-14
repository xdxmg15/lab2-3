<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <title>Editar Medicamento</title>
</head>
<body>

<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Editar Medicamento</h3>
            <form id="medicamentoForm" action="{{ route('medicamentos.update', $medicamento->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="NombreMedicamento">Nombre Medicamento</label>
                    <input type="text" class="form-control" id="NombreMedicamento" name="NombreMedicamento" value="{{ $medicamento->NombreMedicamento }}" required>
                </div>
                <div class="form-group">
                    <label for="TipoMedicamento">Tipo Medicamento</label>
                    <select class="form-control" id="TipoMedicamento" name="TipoMedicamento" required>
                        <option value="" disabled>Seleccione un tipo</option>
                        <option value="analgésico" {{ $medicamento->TipoMedicamento == 'analgésico' ? 'selected' : '' }}>Analgésico</option>
                        <option value="analéptico" {{ $medicamento->TipoMedicamento == 'analéptico' ? 'selected' : '' }}>Analéptico</option>
                        <option value="anestésico" {{ $medicamento->TipoMedicamento == 'anestésico' ? 'selected' : '' }}>Anestésico</option>
                        <option value="antiácido" {{ $medicamento->TipoMedicamento == 'antiácido' ? 'selected' : '' }}>Antiácido</option>
                        <option value="antidepresivo" {{ $medicamento->TipoMedicamento == 'antidepresivo' ? 'selected' : '' }}>Antidepresivo</option>
                        <option value="antibióticos" {{ $medicamento->TipoMedicamento == 'antibióticos' ? 'selected' : '' }}>Antibióticos</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="CantidadMedicamento">Cantidad Medicamento</label>
                    <input type="number" class="form-control" id="CantidadMedicamento" name="CantidadMedicamento" value="{{ $medicamento->CantidadMedicamento }}" required>
                </div>
                <div class="form-group">
                    <label>Distribuidor</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="Cofarma" name="Distribuidor" value="Cofarma" {{ $medicamento->Distribuidor == 'Cofarma' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="Cofarma">Cofarma</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="Empsephar" name="Distribuidor" value="Empsephar" {{ $medicamento->Distribuidor == 'Empsephar' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="Empsephar">Empsephar</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="Cemefar" name="Distribuidor" value="Cemefar" {{ $medicamento->Distribuidor == 'Cemefar' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="Cemefar">Cemefar</label>
                    </div>
                </div>
                <div class="form-group">
    <label>Sucursal</label><br>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="SucursalPrimaria" name="Sucursal[]" value="Primaria" {{ $medicamento->Sucursal == 'Primaria' ? 'checked' : '' }}>
        <label class="form-check-label" for="SucursalPrimaria">Primaria</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="SucursalSecundaria" name="Sucursal[]" value="Secundaria" {{ $medicamento->Sucursal == 'Secundaria' ? 'checked' : '' }}>
        <label class="form-check-label" for="SucursalSecundaria">Secundaria</label>
    </div>
</div>

                <br>
                <button type="button" class="btn btn-primary" id="submitButton">Guardar Cambios</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('medicamentos.index') }}';">Cancelar</button>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('submitButton').addEventListener('click', function() {
        
        const nombreMedicamento = document.getElementById('NombreMedicamento').value;
        const tipoMedicamento = document.getElementById('TipoMedicamento').value;
        const cantidadMedicamento = document.getElementById('CantidadMedicamento').value;
        
        const selectedAddresses = [];
        const sucursalPrimaria = document.getElementById('SucursalPrimaria');
        const sucursalSecundaria = document.getElementById('SucursalSecundaria');

        
        if (sucursalPrimaria.checked) {
            selectedAddresses.push("Calle de la Rosa n. 28"); // Address for Sucursal Primaria
        }
        if (sucursalSecundaria.checked) {
            selectedAddresses.push("Calle Alcazabilla n. 3"); // Address for Sucursal Secundaria
        }

        
        const direccion = `Para la farmacia situada en: ${selectedAddresses.join(', ')}`;


        const confirmationMessage = `Modificar: ${cantidadMedicamento} unidades del ${tipoMedicamento} ${nombreMedicamento} \n\n${direccion}`;


        Swal.fire({
            title: 'Confirmar Cambios',
            text: confirmationMessage,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('medicamentoForm').submit();
            }
        });
    });
</script>

</body>
</html>
