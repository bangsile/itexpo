<?php

namespace App\Livewire;

use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FeedbackList extends Component
{
    public $sortBy = 'desc';
    public function render()
    {
        $feedbacks = [];
        if (Auth::user()->role == 'admin') {
            $feedbacks = Feedback::where('stand', Auth::user()->admin->stand)->orderBy('created_at', $this->sortBy)->paginate(10);
            // dd($feedbacks);
        }
        if (Auth::user()->role == 'super-admin') {
            $feedbacks = Feedback::orderBy('created_at', $this->sortBy)->paginate(10);
        }
        return view('livewire.feedback-list', [
            'feedbacks' => $feedbacks
        ]);
    }
}
