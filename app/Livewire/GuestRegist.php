<?php

namespace App\Livewire;

use App\Models\Guest;
use Illuminate\Validation\Rule;
use Livewire\Component;

class GuestRegist extends Component
{

    public string $name = '';
    public string $gender = 'Laki-Laki';
    public string $address = '';
    public string $phone = '';
    public string $job = '';

    public function mount()
{
    if (session()->has('message')) {
        $this->dispatchBrowserEvent('show-flash-message');
    }
}

    /**
     * Handle an incoming registration request.
     */
    public function register()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', Rule::in(['Laki-Laki', 'Perempuan'])],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
        ]);

        Guest::create($validated);
        session()->flash('success', 'Berhasil registrasi pengunjung!');
        $this->reset();
        return redirect()->route('registrasi-pengunjung');
    }

    public function render()
    {
        return view('livewire.guest-regist');
    }
}
