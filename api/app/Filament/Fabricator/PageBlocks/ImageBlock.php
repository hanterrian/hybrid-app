<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ImageBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('image')
            ->schema([
                SpatieMediaLibraryFileUpload::make('image')
                    ->image()
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
