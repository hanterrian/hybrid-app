<?php

namespace App\Filament\Resources\FilterOptionResource\Pages;

use App\Filament\Resources\FilterOptionResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFilterOptions extends ListRecords
{
    protected static string $resource = FilterOptionResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
