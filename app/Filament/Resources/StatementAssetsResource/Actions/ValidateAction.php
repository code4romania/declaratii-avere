<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatementAssetsResource\Actions;

use App\Models\StatementAssets;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Auth;

class ValidateAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'validate';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->visible(fn (StatementAssets $record): bool => Auth::user()->can('validate', $record));

        $this->label(__('app.actions.validate.button'));

        $this->color('success');

        $this->icon('heroicon-o-document-check');

        $this->outlined();

        $this->modalHeading(__('app.actions.validate.confirm.title'));

        $this->modalDescription(__('app.actions.validate.confirm.description'));

        $this->modalWidth('md');

        $this->action(function (StatementAssets $record) {
            $record->update([
                'validator_id' => Auth::id(),
            ]);

            $this->success();
        });

        $this->successNotificationTitle(__('app.actions.validate.confirm.success'));
    }
}
