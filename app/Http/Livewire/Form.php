<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Form extends Component
{
    public $age;
    public $fruit;
    public $accepted = false;
    public $tags = [];

    public function render()
    {
        return view('livewire.form');
    }
}
