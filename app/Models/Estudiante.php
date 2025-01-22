<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes'; // Nombre de la tabla

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'fecha_nacimiento',
    ];

    // Relación: Un estudiante puede tener muchas matrículas (1:N)
    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'estudiante_id');
    }

    // Relación: Un estudiante puede tener muchas evaluaciones (1:N)
    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'estudiante_id');
    }

    // Relación: Un estudiante puede estar inscrito en muchos cursos a través de la tabla pivote curso_estudiante (N:M)
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_estudiante', 'estudiante_id', 'curso_id');
    }
}

