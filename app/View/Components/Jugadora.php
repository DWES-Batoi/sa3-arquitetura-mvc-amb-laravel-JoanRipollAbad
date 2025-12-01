<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Jugadora extends Component
{
    public $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function render()
    {
        return view('components.jugadora');
    }
}