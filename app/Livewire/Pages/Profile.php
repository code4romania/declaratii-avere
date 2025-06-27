<?php

declare(strict_types=1);

namespace App\Livewire\Pages;

use App\Models\Person;
use Illuminate\View\View;
use Livewire\Component;

class Profile extends Component
{
    public Person $person;

    public function render(): View
    {
        return view('livewire.pages.profile');
    }
}
