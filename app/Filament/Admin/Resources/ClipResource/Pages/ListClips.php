<?php

namespace App\Filament\Admin\Resources\ClipResource\Pages;

use App\Filament\Admin\Resources\ClipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClips extends ListRecords
{
    protected static string $resource = ClipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
