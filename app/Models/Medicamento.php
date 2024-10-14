<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $fillable = [
        'NombreMedicamento',
        'TipoMedicamento',
        'CantidadMedicamento',
        'Distribuidor',
        'Sucursal',
        'Direccion',
      ];
}
