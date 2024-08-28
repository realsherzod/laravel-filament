<?php

namespace App\Filament\Admin\Resources\CatalogResource\Pages;

use App\Filament\Admin\Resources\CatalogResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCatalog extends ViewRecord
{
    protected static string $resource = CatalogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return $this->record->name . ' ' . $this->record->last_name; 
    }
}
