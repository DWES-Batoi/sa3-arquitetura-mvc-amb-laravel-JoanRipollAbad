<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Estadi extends Component
{
    public $nom;
    public $ciutat;
    public $aforament;
    public $equip;

    public function __construct($nom, $ciutat, $aforament, $equip)
    {
        $this->nom = $nom;
        $this->ciutat = $ciutat;
        $this->aforament = $aforament;
        $this->equip = $equip;
    }

    public function render()
    {
        return view('components.estadi');
    }
}