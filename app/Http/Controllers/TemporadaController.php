<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    public function index()
    {
        return Temporada::all();
    }

    public function show($id)
    {
        return Temporada::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        return Temporada::create($data);
    }

    public function update(Request $request, $id)
    {
        $temporada = Temporada::findOrFail($id);
        $data = $request->validate([
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date|after:fecha_inicio',
        ]);

        $temporada->update($data);
        return $temporada;
    }

    public function destroy($id)
    {
        Temporada::destroy($id);
        return response()->json(['message' => 'Temporada eliminada']);
    }
}
