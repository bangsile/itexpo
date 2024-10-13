<?php

namespace App\Livewire\Guest;

use App\Models\Badge;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $guest;
    public $guestBadge;
    public $stands = ['website', 'iot', 'mobile', 'cyber', 'multimedia', 'gis', 'game', 'network', 'troubleshoot'];

    public $badges = [
        'website' => 0,
        'iot' => 0,
        'mobile' => 0,
        'cyber' => 0,
        'multimedia' => 0,
        'gis' => 0,
        'game' => 0,
        'network' => 0,
        'troubleshoot' => 0
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
            'website' => $this->badges['website'],
            'iot' => $this->badges['iot'],
            'mobile' => $this->badges['mobile'],
            'cyber' => $this->badges['cyber'],
            'multimedia' => $this->badges['multimedia'],
            'gis' => $this->badges['gis'],
            'game' => $this->badges['game'],
            'network' => $this->badges['network'],
            'troubleshoot' => $this->badges['troubleshoot']
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
