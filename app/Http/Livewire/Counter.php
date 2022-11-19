<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    // public にしたものは、自動でviewに変数がいく。
    public $counter = 0;
    public function incriment()
    {
        $this->counter++;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
