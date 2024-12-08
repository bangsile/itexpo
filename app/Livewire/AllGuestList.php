<?php

namespace App\Livewire;

use App\Models\Guest;
use Livewire\Component;
use Livewire\WithPagination;

class AllGuestList extends Component
{
    use WithPagination;
    public $search = '';
    public $date;
    public $name;
    public $address;
    public $job;
    public $sortBy = 'desc';
    public $page = 1;
    protected $queryString = ['search', 'page'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        return view(
            'livewire.all-guest-list',
            [
                "guests" => Guest::when($this->date, fn($query) => $query->whereDate('created_at', $this->date))
                    ->when($this->sortBy, fn($query) => $query->orderBy('created_at', $this->sortBy))
                    ->orderBy('updated_at', 'desc')
                    ->search(trim($this->search), $this->name, $this->address, $this->job)
                    ->paginate(10)
            ]
        );
    }
}
