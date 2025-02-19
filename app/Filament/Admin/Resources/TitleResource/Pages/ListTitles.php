<?php

namespace App\Filament\Admin\Resources\TitleResource\Pages;

use App\Filament\Admin\Resources\TitleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTitles extends ListRecords
{
    protected static string $resource = TitleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
