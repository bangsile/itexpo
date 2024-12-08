<?php

namespace App\Livewire\Guest;

use App\Models\Badge;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $guest;
    public $guestBadge;
    public $stands = ['Website', 'IoT', 'Mobile', 'Cyber', 'Multimedia', 'GIS', 'Game', 'network', 'Troubleshooting'];

    public $badges = [
        'Website' => 0,
        'IoT' => 0,
        'Mobile' => 0,
        'Cyber' => 0,
        'Multimedia' => 0,
        'GIS' => 0,
        'Game' => 0,
        'Network' => 0,
        'Troubleshooting' => 0
    ];


    public function mount($guest)
    {
        $this->guest = $guest;
        $this->guestBadge  = Badge::where(['user_id' => $guest->id])->first();
        foreach ($this->stands as $stand) {
            $this->badges[$stand] = $this->guestBadge->$stand;
        }
    }

    public function saveBadge()
    {
        Badge::where('user_id', $this->guest->id)->update([
            'Website' => $this->badges['Website'],
            'IoT' => $this->badges['IoT'],
            'Mobile' => $this->badges['Mobile'],
            'Cyber' => $this->badges['Cyber'],
            'Multimedia' => $this->badges['Multimedia'],
            'GIS' => $this->badges['GIS'],
            'Game' => $this->badges['Game'],
            'Network' => $this->badges['Network'],
            'Troubleshooting' => $this->badges['Troubleshooting']
        ]);

        $this->dispatch('badge-updated');

    }

    public function render()
    {
        return view('livewire.guest.edit', [
            'guest' => $this->guest
        ]);
    }
}
