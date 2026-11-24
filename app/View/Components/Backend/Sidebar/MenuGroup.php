<?php

namespace App\View\Components\Backend\Sidebar;

use App\Models\Authority;
use App\Models\Feature;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuGroup extends Component
{
    /**
     * Create a new component instance.
     */

    public $name;
    public $class;

    public function __construct($class, $name)
    {
        $this->class = $class;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.sidebar.menu-group', [
            'feature' => Feature::where('code', $this->key)->get(),
            'authority' => Authority::find(auth()->user()->authority_id),
        ]);
    }
}
