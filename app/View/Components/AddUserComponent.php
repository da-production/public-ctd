<?php

namespace App\View\Components;

use App\Agence;
use App\Previlage;
use Illuminate\View\Component;

class AddUserComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $agences = Agence::all();
        $previlages = Previlage::all();
        return view('components.add-user-component', compact('agences','previlages'));
    }
}
