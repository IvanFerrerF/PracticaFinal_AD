<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        return Asignatura::all();
    }

    public function show($id)
    {
        return Asignatura::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'curso_id' => 'required|exists:cursos,id',
            'profesor_id' => 'required|exists:profesores,id',
        ]);

        return Asignatura::create($data);
    }

    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::findOrFail($id);
        $data = $request->validate([
            'nombre' => 'string',
            'curso_id' => 'exists:cursos,id',
            'profesor_id' => 'exists:profesores,id',
        ]);
        $asignatura->update($data);
        return $asignatura;
    }

    public function destroy($id)
    {
        Asignatura::destroy($id);
        return response()->json(['message' => 'Asignatura eliminada']);
    }
}
