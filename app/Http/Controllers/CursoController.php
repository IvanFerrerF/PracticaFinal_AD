<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return Curso::all();
    }

    public function show($id)
    {
        return Curso::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'duracion' => 'required|integer|min:1',
            'id_temporada' => 'nullable|exists:temporadas,id', 
        ]);

        return Curso::create($data);
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $data = $request->validate([
            'nombre' => 'string',
            'descripcion' => 'string',
            'duracion' => 'integer|min:1',
            'id_temporada' => 'nullable|exists:temporadas,id',
        ]);

        $curso->update($data);
        return $curso;
    }

    public function destroy($id)
    {
        Curso::destroy($id);
        return response()->json(['message' => 'Curso eliminado']);
    }
}
