<?php

namespace App\View\Components\Backend\Sidebar;

use App\Models\Authority;
use Closure;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Div extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $user = null;
        if (auth()->user()) {
            $user = auth()->user();
        } elseif (auth()->guard('company')->user()) {
            $user = auth()->guard('company')->user();
        } elseif (auth()->guard('supplier')->user()) {
            $user = auth()->guard('supplier')->user();
        }
        return view('components.backend.sidebar.div', [
            'master_data' => ['slider', 'product', 'blog', 'category_product', 'superiority', 'about'],
            'authority' => Authority::find($user->authorities_id),
            'user' => $user
        ]);
    }
}
