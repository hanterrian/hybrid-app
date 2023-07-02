<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\CategoryFilterItem;
use App\Models\FilterOption;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryFilterItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'categoryFilterItems';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('filter_option_id')
                    ->label('Option')
                    ->options(FilterOption::all()->pluck('name', 'id'))
                    ->reactive()
                    ->required(),

                Forms\Components\TextInput::make('value')
                    ->visible(function (\Closure $get) {
                        $option = $get('filter_option_id');

                        $type = FilterOption::where('id', $option)->first();

                        if (!$type) {
                            return true;
                        }

                        return $type->type == FilterOption::TYPE_TEXT;
                    }),
                Forms\Components\TagsInput::make('value_list')
                    ->visible(function (\Closure $get) {
                        $option = $get('filter_option_id');

                        $type = FilterOption::where('id', $option)->first();

                        if (!$type) {
                            return true;
                        }

                        return $type->type == FilterOption::TYPE_SELECT;
                    }),
                Forms\Components\TextInput::make('min_value')
                    ->visible(function (\Closure $get) {
                        $option = $get('filter_option_id');

                        $type = FilterOption::where('id', $option)->first();

                        if (!$type) {
                            return true;
                        }

                        return $type->type == FilterOption::TYPE_RANGE;
                    }),
                Forms\Components\TextInput::make('max_value')
                    ->visible(function (\Closure $get) {
                        $option = $get('filter_option_id');

                        $type = FilterOption::where('id', $option)->first();

                        if (!$type) {
                            return true;
                        }

                        return $type->type == FilterOption::TYPE_RANGE;
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('filterOption.name'),
                Tables\Columns\TextColumn::make('filterOption.type')
                    ->enum(FilterOption::TYPES),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
