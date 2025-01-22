<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index() {
        return Profesor::all();
    }

    public function show($id) {
        return Profesor::findOrFail($id);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email|unique:profesores,email',
            'telefono' => 'nullable|string',
            'especialidad' => 'required|string',
        ]);
        return Profesor::create($data);
    }

    public function update(Request $request, $id) {
        $prof = Profesor::findOrFail($id);
        $data = $request->validate([
            'nombre' => 'string',
            'apellidos' => 'string',
            'email' => 'email|unique:profesores,email,' . $id,
            'telefono' => 'nullable|string',
            'especialidad' => 'string',
        ]);
        $prof->update($data);
        return $prof;
    }

    public function destroy($id) {
        Profesor::destroy($id);
        return response()->json(['message' => 'Profesor eliminado']);
    }
}
