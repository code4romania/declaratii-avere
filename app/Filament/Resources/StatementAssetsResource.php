<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\StatementAssetsResource\Pages;
use App\Filament\Resources\StatementAssetsResource\Schemas\DebtsForm;
use App\Filament\Resources\StatementAssetsResource\Schemas\FinancialAssetsForm;
use App\Filament\Resources\StatementAssetsResource\Schemas\GiftsForm;
use App\Filament\Resources\StatementAssetsResource\Schemas\ImmovableGoodsForm;
use App\Filament\Resources\StatementAssetsResource\Schemas\IncomesForm;
use App\Filament\Resources\StatementAssetsResource\Schemas\MovableGoodsForm;
use App\Filament\Resources\StatementAssetsResource\Schemas\PersonForm;
use App\Filament\Resources\StatementAssetsResource\Schemas\TransfersForm;
use App\Forms\Components\DocumentPreview;
use App\Models\StatementAssets;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class StatementAssetsResource extends Resource
{
    protected static ?string $model = StatementAssets::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        // TODO: get from db
        $file = Storage::url('01JWRJRQ3F7B2GCP7HRWFXDMG5.pdf');

        return $form
            ->columns([
                'default' => 1,
                'md' => 2,
                '2xl' => 3,
            ])
            ->schema([
                DocumentPreview::make('preview')
                    ->hiddenLabel()
                    ->url($file)
                    ->columnSpan([
                        '2xl' => 2,
                    ]),

                Group::make()
                    ->columnSpan(1)
                    ->extraAttributes([
                        'class' => 'h-[70vh] overflow-y-scroll',
                    ])
                    ->schema([
                        PersonForm::getSection(),
                        ImmovableGoodsForm::getSection(),
                        MovableGoodsForm::getSection(),
                        TransfersForm::getSection(),
                        FinancialAssetsForm::getSection(),
                        DebtsForm::getSection(),
                        GiftsForm::getSection(),
                        IncomesForm::getSection(),

                        Section::make()
                            ->schema([
                                DatePicker::make('statement_date')
                                    ->label(__('app.field.statement_date'))
                                    ->maxDate(today())
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatementAssets::route('/'),
            'create' => Pages\CreateStatementAssets::route('/create'),
            'edit' => Pages\EditStatementAssets::route('/{record}/edit'),
        ];
    }
}
