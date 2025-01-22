<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $table = 'temporadas'; // Nombre de la tabla asociada al modelo

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
    ];

    // Relación: Una temporada tiene un curso asignado (1:1)
    public function curso()
    {
        return $this->hasOne(Curso::class, 'id_temporada');
    }
}
