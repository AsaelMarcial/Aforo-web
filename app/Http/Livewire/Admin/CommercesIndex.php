<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Commerce;
use Livewire\WithPagination;

class CommercesIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $commerces = Commerce::where('user_id', auth()->user()->id)
            ->where('name', 'like', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10);
        return view('livewire.admin.commerces-index', compact('commerces'));

    }
}
