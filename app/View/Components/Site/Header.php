<?php

declare(strict_types=1);

namespace App\View\Components\Site;

use Datlechin\FilamentMenuBuilder\Models\Menu;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class Header extends Component
{
    public Collection $menuItems;

    public function __construct()
    {
        $this->menuItems = Menu::location('header')?->menuItems;
    }

    public function render(): View
    {
        return view('components.site.header');
    }
}
