<?php

namespace App\View\Components;

use Illuminate\View\Component;
use function logo_src_set;                   // 👈 importa el helper

class NavLogo extends Component
{
    public array $white;
    public array $black;

    public function __construct()
    {
        $this->white = logo_src_set('Logo_SyleStudio_Syle_W');
        $this->black = logo_src_set('Logo_SyleStudio_Syle_B');
    }

    public function render()
    {
        return view('components.nav-logo');
    }
}
