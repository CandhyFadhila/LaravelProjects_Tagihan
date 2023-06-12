<?php

namespace App\Filament\Resources\TagihanRumahResource\Pages;

use App\Filament\Resources\TagihanRumahResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagihanRumahs extends ListRecords
{
    protected static string $resource = TagihanRumahResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
