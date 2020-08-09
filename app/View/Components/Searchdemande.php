<?php

namespace App\View\Components;

use App\Role;
use Illuminate\View\Component;
use App\Wilaya;
use Illuminate\Support\Facades\Auth;

class Searchdemande extends Component
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

    public function isAllow()
    {
        if(in_array(Auth::user()->privilage,Role::action('r')))
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
        
        $wilayas = Wilaya::all();
        $limits = [10,25,50,75,100];
        $etats = [
            '1' => 'Validée',
            '2' => 'Réfusée',
            '3' => 'Clôturée',
            '5' => 'En attente'
        ];
        return view('components.searchdemande', compact('wilayas','limits','etats'));
    }
}
