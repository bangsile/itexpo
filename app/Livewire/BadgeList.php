<?php

namespace App\Livewire;

use App\Models\Badge;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BadgeList extends Component
{
    public function render()
    {
        $badges = Badge::where('user_id', Auth::user()->id)->first();
        return view('livewire.badge-list', [
            "badges" => $badges,
        ]);
    }
}
