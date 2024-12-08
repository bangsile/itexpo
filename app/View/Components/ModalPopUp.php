<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalPopUp extends Component
{
    /**
     * Create a new component instance.
     */

     public $name = '';
     public $stand = '';
     public $message = '';
    public function __construct($name, $stand, $message)
    {
        $this->name = $name;
        $this->stand = $stand;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-pop-up');
    }
}
