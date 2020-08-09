<?php

namespace App\View\Components;

use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Leftaside extends Component
{
    public $autorize = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        
    }

    public function isAllowed($action)
    {

        if(in_array(Auth::user()->privilage,Role::action($action)))
        {
            return true;
        }
        return false;

    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        
        return view('components.leftaside');
    }
}
