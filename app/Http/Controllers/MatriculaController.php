<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        return Matricula::all();
    }

    public function show($id)
    {
        return Matricula::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'estudiante_id' => 'required|exists:estudiantes,id',
            'fecha_matricula' => 'required|date'
        ]);

        return Matricula::create($data);
    }

    public function update(Request $request, $id)
    {
        $matricula = Matricula::findOrFail($id);
        $data = $request->validate([
            'curso_id' => 'exists:cursos,id',
            'estudiante_id' => 'exists:estudiantes,id',
            'fecha_matricula' => 'date'
        ]);

        $matricula->update($data);
        return $matricula;
    }

    public function destroy($id)
    {
        Matricula::destroy($id);
        return response()->json(['message' => 'Matrícula eliminada']);
    }
}
