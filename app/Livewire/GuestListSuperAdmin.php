<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class GuestListSuperAdmin extends Component
{
    public $search = '';
    public function render()
    {
        $stands = ['Website', 'IoT', 'Mobile', 'Cyber', 'Multimedia', 'GIS', 'Game', 'network', 'Troubleshooting'];
        // $stands = ['website', 'iot', 'mobile', 'cyber', 'multimedia', 'gis', 'game', 'network', 'troubleshoot'];
        return view('livewire.guest-list-super-admin', [
            "guests" => User::where('role', 'pengunjung')->search(trim($this->search))->paginate(10),
            "stands" => $stands
        ]);
    }
}
