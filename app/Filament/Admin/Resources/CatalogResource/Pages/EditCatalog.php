<?php

namespace App\Filament\Admin\Resources\CatalogResource\Pages;

use App\Filament\Admin\Resources\CatalogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCatalog extends EditRecord
{
    protected static string $resource = CatalogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
