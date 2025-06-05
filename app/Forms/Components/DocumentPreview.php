<?php

declare(strict_types=1);

namespace App\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;

class DocumentPreview extends Field
{
    protected string $view = 'forms.components.document-preview';

    protected string | Closure | null $url = null;

    public function url(string | Closure | null $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->evaluate($this->url);
    }
}
