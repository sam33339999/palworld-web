<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $name = '';

    public function render()
    {
        return view('livewire.search-bar');
    }

    public function mount()
    {
        $this->name = request()->query('name', $this->name);
    }

    public function updatedName($value)
    {
        // 更新 query string
        // dd($value);
        $this->dispatch('update-search-name', ['name' => $value]);
        // dd($value);
    }
}
