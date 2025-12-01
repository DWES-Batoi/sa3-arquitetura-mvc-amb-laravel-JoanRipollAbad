<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartitsController extends Controller
{
    public $partits = [
        [
            'equip_local'   => 'Barça Femení',
            'equip_visitant'=> 'Atlètic de Madrid',
            'gols_local'    => '',
            'gols_visitant' => '',
            'data'          => '2024-11-30',
        ],
        [
            'equip_local'   => 'Real Madrid Femení',
            'equip_visitant'=> 'Barça Femení',
            'gols_local'    => '0',
            'gols_visitant' => '3',
            'data'          => '2024-12-15',
        ]
    ];

    public function index()
    {
        $partits = Session::get('partits', $this->partits);
        return view('partits.index', compact('partits'));
    }

    public function create()
    {
        return view('partits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'equip_local'   => 'required|string|min:2|max:255',
            'equip_visitant'=> 'required|string|min:2|max:255|different:equip_local',
            'data'          => 'required|date',
            'resultat'      => [
                'nullable',
                'regex:/^\d+-\d+$/',
                'sometimes',
            ],
        ], [
            'resultat.regex' => 'El resultat ha de tenir el format "X-Y", per exemple: 2-1.',
        ]);

        if (isset($validated['resultat'])) {
            [$gols_local, $gols_visitant] = explode('-', $validated['resultat']);
            $validated['gols_local'] = (int) $gols_local;
            $validated['gols_visitant'] = (int) $gols_visitant;
            unset($validated['resultat']);
        } else {
            $validated['gols_local'] = null;
            $validated['gols_visitant'] = null;
        }

        $partits = Session::get('partits', $this->partits);
        $partits[] = $validated;
        Session::put('partits', $partits);

        return redirect()->route('partits.index')->with('success', 'Partit afegit correctament!');
    }
}