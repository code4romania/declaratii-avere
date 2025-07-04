<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\StatementAssets;
use App\Models\StatementInterests;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function assets(Person $person, ?StatementAssets $statement = null): RedirectResponse|View
    {
        if (blank($statement)) {
            $statement = $person
                ->statementAssets()
                ->orderBy('statement_date', 'desc')
                ->first();

            return redirect()->route('front.profile.assets', [
                'person' => $person,
                'statement' => $statement,
            ]);
        }

        return view('pages.profile-assets', [
            'person' => $person,
            'statement' => $statement,
        ]);
    }

    public function interests(Person $person, ?StatementInterests $statement = null): RedirectResponse|View
    {
        if (blank($statement)) {
            $statement = $person
                ->statementInterests()
                ->orderBy('statement_date', 'desc')
                ->first();

            return redirect()->route('front.profile.interests', [
                'person' => $person,
                'statement' => $statement,
            ]);
        }

        return view('pages.profile-interests', [
            'person' => $person,
            'statement' => $statement,
        ]);
    }
}
