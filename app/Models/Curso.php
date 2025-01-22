<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos'; // Nombre de la tabla

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion',
        'id_temporada', // Ahora incluye la relación con la tabla Temporada
    ];

    // Relación: Un curso pertenece a una temporada (1:1)
    public function temporada()
    {
        return $this->belongsTo(Temporada::class, 'id_temporada');
    }

    // Relación: Un curso tiene muchas asignaturas (1:N)
    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, 'curso_id');
    }

    // Relación: Un curso tiene muchas matrículas (1:N)
    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'curso_id');
    }

    // Relación: Un curso tiene muchas evaluaciones (1:N)
    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'curso_id');
    }

    // Relación: Un curso tiene muchos estudiantes a través de la tabla pivote curso_estudiante (N:M)
    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'curso_estudiante', 'curso_id', 'estudiante_id');
    }
}

