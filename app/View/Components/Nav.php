<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Nav extends Component
{
    public $links;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = [
            ['name' => 'Info', 'uri' => 'beer.info'],
            ['name' => 'Contatti', 'uri' => 'beer.contact']
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {


        return view('components.nav', ['links' =>  $this->links]);
    }
}
