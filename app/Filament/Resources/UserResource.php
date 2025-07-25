<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\UserRole;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getModelLabel(): string
    {
        return __('app.user.label.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('app.user.label.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')
                    ->label(__('app.field.name'))
                    ->required(),

                TextInput::make('email')
                    ->label(__('app.field.email'))
                    ->required()
                    ->unique(ignoreRecord: true),

                Select::make('role')
                    ->label(__('app.field.role'))
                    ->options(UserRole::options())
                    ->enum(UserRole::class)
                    ->columnSpanFull()
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('app.field.name'))
                    ->searchable(),

                TextColumn::make('email')
                    ->label(__('app.field.email'))
                    ->searchable(),

                TextColumn::make('role')
                    ->label(__('app.field.role')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

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
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}
