<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // GET /api/estudiantes
    public function index()
    {
        return Estudiante::all();
    }

    // GET /api/estudiantes/{id}
    public function show($id)
    {
        return Estudiante::findOrFail($id);
    }

    // POST /api/estudiantes
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email|unique:estudiantes,email',
            'telefono' => 'nullable|string',
            'fecha_nacimiento' => 'required|date',
        ]);

        return Estudiante::create($data);
    }

    // PUT/PATCH /api/estudiantes/{id}
    public function update(Request $request, $id)
    {
        $est = Estudiante::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'string',
            'apellidos' => 'string',
            'email' => 'email|unique:estudiantes,email,' . $id,
            'telefono' => 'nullable|string',
            'fecha_nacimiento' => 'date',
        ]);

        $est->update($data);
        return $est;
    }

    // DELETE /api/estudiantes/{id}
    public function destroy($id)
    {
        Estudiante::destroy($id);
        return response()->json(['message' => 'Estudiante eliminado']);
    }
}
