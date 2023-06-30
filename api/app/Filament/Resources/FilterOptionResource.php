<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilterOptionResource\Pages;
use App\Models\FilterOption;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class FilterOptionResource extends Resource
{
    protected static ?string $model = FilterOption::class;

    protected static ?string $slug = 'filter-options';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),

                Select::make('type')
                    ->options(FilterOption::TYPES)
                    ->required(),

                Checkbox::make('enable'),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn (?FilterOption $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn (?FilterOption $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->enum(FilterOption::TYPES),

                TextColumn::make('category_filter_items_count')
                    ->label('Attached items')
                    ->counts('categoryFilterItems'),

                ToggleColumn::make('enable'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFilterOptions::route('/'),
            'create' => Pages\CreateFilterOption::route('/create'),
            'edit' => Pages\EditFilterOption::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
