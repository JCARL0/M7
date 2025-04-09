<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuari;

class UsuariController extends Controller
{
    public function index()
    {
        // Consulta con Query Builder
        $usuaris = DB::table('usuaris')
            ->join('comandes', 'usuaris.id', '=', 'comandes.usuari_id')
            ->select('usuaris.id', 'usuaris.nom', DB::raw('COUNT(comandes.id) as total_comandes'))
            ->groupBy('usuaris.id', 'usuaris.nom')
            ->having('total_comandes', '>', 0)
            ->get();

        return view('usuaris.index', compact('usuaris'));
    }
}
