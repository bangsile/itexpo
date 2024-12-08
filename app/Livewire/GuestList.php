<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class GuestList extends Component
{
    public $search = '';
    public function render()
    {
        $stands = ['Website', 'IoT', 'Mobile', 'Cyber', 'Multimedia', 'GIS', 'Game', 'Networking', 'Troubleshooting'];

        return view('livewire.guest-list', [
            "guests" => User::where('role', 'pengunjung')->search(trim($this->search))->paginate(10),
            "stands" => $stands
        ]);
    }
}
