<?php

namespace App\Livewire;

use App\Models\Feedback;
use Livewire\Component;

class FeedbackForm extends Component
{
    public string $name;
    public string $stand = '';
    public string $message;

    public function mount()
{
    if (session()->has('message')) {
        $this->dispatchBrowserEvent('show-flash-message');
    }
}
    

    public function send()
    {
        $validated = $this->validate([
            'name' => ['nullable','string', 'max:255'],
            'stand' => ['string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        Feedback::create($validated);
        session()->flash('success', 'Berhasil memberikan feedback. Terima Kasih!');
        $this->reset();
        return redirect()->route('feedback');
    }

    public function render()
    {
        return view('livewire.feedback-form');
    }
}
