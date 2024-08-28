<?php

namespace App\Filament\Admin\Resources\CatalogResource\Pages;

use App\Filament\Admin\Resources\CatalogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCatalogs extends ListRecords
{
    protected static string $resource = CatalogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
