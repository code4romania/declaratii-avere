<?php

declare(strict_types=1);

namespace App\View\Components\Profile;

use App\Models\Person;
use App\Models\StatementAssets;
use App\Models\StatementInterests;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public function __construct(
        public Person $person,
        public StatementAssets|StatementInterests $statement,
    ) {
        //
    }

    public function render(): View
    {
        return view('components.profile.header');
    }
}
