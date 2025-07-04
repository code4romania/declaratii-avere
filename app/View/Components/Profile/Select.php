<?php

declare(strict_types=1);

namespace App\View\Components\Profile;

use App\Enums\DeclarationType;
use App\Models\Person;
use App\Models\StatementAssets;
use App\Models\StatementInterests;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Select extends Component
{
    public Collection $statements;

    public function __construct(
        public DeclarationType $type,
        public Person $person,
        public StatementAssets|StatementInterests $statement,
    ) {
        $this->statements = $this->getStatements();
    }

    public function getStatements(): Collection
    {
        $query = match ($this->type) {
            DeclarationType::ASSETS => StatementAssets::query(),
            DeclarationType::INTERESTS => StatementInterests::query(),
        };

        return $query
            ->where('person_id', $this->person->id)
            ->orderBy('statement_date', 'desc')
            ->get(['id', 'statement_date', 'type']);
    }

    public function render(): View
    {
        return view('components.profile.select');
    }
}
