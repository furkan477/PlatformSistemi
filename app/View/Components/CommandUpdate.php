<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommandUpdate extends Component
{
    /**
     * Create a new component instance.
     */
    public $commentEdit;
    public function __construct($commentEdit)
    {
        $this->commentEdit = $commentEdit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.command-update');
    }
}
