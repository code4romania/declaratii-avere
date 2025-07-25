<?php

declare(strict_types=1);

namespace App\View\Components\Site;

use Datlechin\FilamentMenuBuilder\Models\Menu;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Footer extends Component
{
    public Collection $menuItems;

    public Collection $socialItems;

    public function __construct()
    {
        $this->menuItems = Menu::location('footer')?->menuItems ?? collect();

        $this->socialItems = $this->getSocialItems();
    }

    protected function getSocialItems(): Collection
    {
        return collect([
            [
                'name' => 'Facebook',
                'url' => 'https://www.facebook.com/code4romania/',
                'icon' => 'ri-facebook-fill',
            ],
            [
                'name' => 'Twitter',
                'url' => 'https://x.com/code4romania/',
                'icon' => 'ri-twitter-x-fill',
            ],
            [
                'name' => 'Instagram',
                'url' => 'https://www.instagram.com/code4romania/',
                'icon' => 'ri-instagram-line',
            ],
            [
                'name' => 'LinkedIn',
                'url' => 'https://www.linkedin.com/company/code4romania/',
                'icon' => 'ri-linkedin-fill',
            ],
            [
                'name' => 'GitHub',
                'url' => 'https://github.com/code4romania/',
                'icon' => 'ri-github-fill',
            ],
        ]);
    }

    public function render(): View
    {
        return view('components.site.footer');
    }
}
