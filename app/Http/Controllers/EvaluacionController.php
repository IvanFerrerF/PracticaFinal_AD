<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    public function index()
    {
        return Evaluacion::all();
    }

    public function show($id)
    {
        return Evaluacion::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'asignatura_id' => 'required|exists:asignaturas,id',
            'curso_id' => 'required|exists:cursos,id',
            'nota' => 'required|numeric|between:0,10'
        ]);

        return Evaluacion::create($data);
    }

    public function update(Request $request, $id)
    {
        $ev = Evaluacion::findOrFail($id);
        $data = $request->validate([
            'estudiante_id' => 'exists:estudiantes,id',
            'asignatura_id' => 'exists:asignaturas,id',
            'curso_id' => 'exists:cursos,id',
            'nota' => 'numeric|between:0,10'
        ]);

        $ev->update($data);
        return $ev;
    }

    public function destroy($id)
    {
        Evaluacion::destroy($id);
        return response()->json(['message' => 'Evaluación eliminada']);
    }
}
