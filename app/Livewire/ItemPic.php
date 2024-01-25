<?php

namespace App\Livewire;

use Livewire\Component;

class ItemPic extends Component
{
    // public function render()
    // {
    //     return view('livewire.item-pic');
    // }
    public $data;

    public function mount($data)
    {
        $this->data = $data;
        return view('livewire.item-pic');
    }

}
