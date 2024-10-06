<?php

namespace App\Livewire;

use App\Models\AdminStand;
use App\Models\Badge;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GuestList extends Component
{
    public function render()
    {
        $admin = Auth::user()->id;
        // dd($badges);
        return view('livewire.guest-list', [
            "guests" => User::where('role', 'pengunjung')->get(),
        ]);
    }
}
