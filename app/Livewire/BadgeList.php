<?php

namespace App\Livewire;

use App\Models\Badge;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BadgeList extends Component
{
    // public 

    public function mount()
    {
        
    }
    public function render()
    {

        $badges = Badge::where('user_id', Auth::user()->id)->first();
        $totalBadge = 0;
        $stands = ['website', 'iot', 'mobile', 'cyber', 'multimedia', 'gis', 'game', 'network', 'troubleshoot'];
        foreach ($stands as $stand) {
            if ($badges->$stand) {
                $totalBadge++;
            }
        }
        // dd($totalBadge);
        return view('livewire.badge-list', [
            "badges" => $badges,
            "totalBadge" => $totalBadge
        ]);
    }
}
