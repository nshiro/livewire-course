<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 0;
    public $name = 'shiro';

    public function increment(int $num = 1)
    {
        $this->counter += $num;

        if ($this->counter > 100) {
            $this->counter = 1;
        }

        // dump('increment');
    }

    // public function boot()
    // {
    //     dump('boot');
    // }

    // public function booted()
    // {
    //     dump('booted');
    // }

    // public function mount()
    // {
    //     $this->counter = random_int(1, 100);

    //     dump('mount');
    // }

    // public function hydrate()
    // {
    //     dump('hydrate');
    // }

    // public function deHydrate()
    // {
    //     dump('deHydrate');
    // }

    // public function updating($name, $value)
    // {
    //     dump('updating - '. $name.' → '.$value);
    // }

    // public function updatingName($value)
    // {
    //     dump('updatingName - '.$value);
    // }

    // public function updatingCounter($value)
    // {
    //     dump('updatingCounter - '.$value);
    // }

    // public function updated($name, $value)
    // {
    //     dump('updated - '. $name.' → '.$value);
    // }

    public function render()
    {
        return view('livewire.counter');
    }
}
