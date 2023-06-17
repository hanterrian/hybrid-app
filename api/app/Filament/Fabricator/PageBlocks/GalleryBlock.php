<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class GalleryBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('gallery')
            ->schema([
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('gallery')
                    ->multiple()
                    ->image()
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
