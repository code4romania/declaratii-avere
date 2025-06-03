<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\StatementAssetsResource\Pages;
use App\Filament\Resources\StatementAssetsResource\Schemas\PersonForm;
use App\Filament\Resources\StatementAssetsResource\Schemas\RealEstateForm;
use App\Forms\Components\DocumentPreview;
use App\Models\StatementAssets;
use Filament\Forms\Components\Group;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StatementAssetsResource extends Resource
{
    protected static ?string $model = StatementAssets::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                DocumentPreview::make('preview')
                    ->hiddenLabel()
                    ->columnSpan(2)
                    ->default('https://colectare.test/storage/01JWRJD3QKV08X1QYZFM9S4000.pdf'),

                Group::make()
                    ->columnSpan(1)
                    ->extraAttributes([
                        'class' => 'h-[70vh] overflow-y-scroll',
                    ])
                    ->schema([
                        PersonForm::getSection(),
                        RealEstateForm::getSection(),
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
