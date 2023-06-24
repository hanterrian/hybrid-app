<?php

namespace App\Filament\Resources\FilterOptionResource\Pages;

use App\Filament\Resources\FilterOptionResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFilterOption extends EditRecord
{
    protected static string $resource = FilterOptionResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
