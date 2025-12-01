<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JugadoraController extends Controller
{
    public $jugadoras = [
        ['nom' => 'Alexia Putellas', 'equip' => 'Barça Femení', 'posicio' => 'Migcampista'],
        ['nom' => 'Esther González', 'equip' => 'Atlètic de Madrid', 'posicio' => 'Davantera'],
        ['nom' => 'Misa Rodríguez', 'equip' => 'Real Madrid Femení', 'posicio' => 'Portera'],
    ];

    public function index()
    {
        $jugadoras = Session::get('jugadoras', $this->jugadoras); 
        return view('jugadoras.index', compact('jugadoras'));
    }

    public function create()
    {
        return view('jugadoras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'     => 'required|string|min:3|max:255',
            'equip'   => 'required|string|min:2|max:255',
            'posicio' => 'required|in:Portera,Defensa,Migcampista,Davantera',
        ]);

        $jugadoras = Session::get('jugadoras', $this->jugadoras);
        $jugadoras[] = $validated;
        Session::put('jugadoras', $jugadoras);

        return redirect()->route('jugadoras.index')->with('success', 'Jugadora afegida correctament!');
    }
}