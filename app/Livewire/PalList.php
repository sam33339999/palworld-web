<?php

namespace App\Livewire;

use App\Models\Pal;
use Livewire\Attributes\On;
use Livewire\Component;

class PalList extends Component
{
    public $pals, $name;

    public function mount($pals)
    {
        $this->pals = $pals;
        $this->name = request()->query('name', $this->name);
        return view('livewire.pal-list');
    }

    public function render()
    {
        $this->pals = $this->getData(request('name'));
        return view('livewire.pal-list');
    }

    protected function getData($name)
    {
        $palBuilder = Pal::with(['attrs', 'drops']);

        $palBuilder->when($name, function ($query) use ($name) {
            return $query->where(function ($q) use ($name) {
                $q->where('zh_name', 'like', '%' . $name . '%')
                    ->orWhere('en_name', 'like', '%' . $name . '%');
            });
        });
        return $palBuilder->orderBy('id', 'asc')->get();
    }

    #[On('update-search-name')]
    public function updatePostList($value)
    {
        $this->pals = $this->getData($value['name']);
    }
}
