<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\StatementType;
use App\Filament\Resources\StatementInterestsResource\Pages;
use App\Filament\Resources\StatementInterestsResource\Schemas;
use App\Forms\Components\DocumentPreview;
use App\Models\SourceFile;
use App\Models\StatementInterests;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class StatementInterestsResource extends Resource
{
    protected static ?string $model = StatementInterests::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return __('app.interests.label.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('app.interests.label.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns([
                'default' => 1,
                'md' => 2,
                '2xl' => 3,
            ])
            ->schema([
                DocumentPreview::make('preview')
                    ->hiddenLabel()
                    ->url(function (?StatementInterests $record, Get $get, Set $set): ?string {
                        if (filled($record)) {
                            return $record->getPdfUrl();
                        }

                        if (filled($get('source_file_url'))) {
                            return $get('source_file_url');
                        }

                        $file = SourceFile::getAssetsFile();

                        if (blank($file)) {
                            return null;
                        }

                        $set('source_file_id', $file->id);
                        $set('source_file_url', $file->getPdfUrl());

                        return $file->getPdfUrl();
                    })
                    ->columnSpan([
                        '2xl' => 2,
                    ]),

                Hidden::make('source_file_id'),
                Hidden::make('source_file_url'),

                Group::make()
                    ->columnSpan(1)
                    ->extraAttributes([
                        'class' => 'h-[70vh] overflow-y-scroll',
                    ])
                    ->schema([
                        Schemas\PersonForm::getSection(),
                        Schemas\ShareholderForm::getSection(),
                        Schemas\ManagerForm::getSection(),
                        Schemas\ProfessionalForm::getSection(),
                        Schemas\PartyForm::getSection(),
                        Schemas\ContractForm::getSection(),

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
                TextColumn::make('person.name')
                    ->label(__('app.field.person'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('position.title')
                    ->label(__('app.field.position'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('institution.name')
                    ->label(__('app.field.institution'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label(__('app.field.type')),

                TextColumn::make('validator.name')
                    ->label(__('app.field.validated_by')),

                TextColumn::make('statement_date')
                    ->label(__('app.field.statement_date'))
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('person_id')
                    ->label(__('app.field.person'))
                    ->relationship('person', 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),

                SelectFilter::make('position_id')
                    ->label(__('app.field.position'))
                    ->relationship('position', 'title')
                    ->searchable()
                    ->multiple()
                    ->preload(),

                SelectFilter::make('institution_id')
                    ->label(__('app.field.institution'))
                    ->relationship('institution', 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),

                SelectFilter::make('type')
                    ->label(__('app.field.type'))
                    ->options(StatementType::options())
                    ->multiple()
                    ->preload(),
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
            'index' => Pages\ListStatementInterests::route('/'),
            'create' => Pages\CreateStatementInterests::route('/create'),
            'edit' => Pages\EditStatementInterests::route('/{record}/edit'),
        ];
    }
}
