<?php

namespace App\Filament\Admin\Resources\ClipResource\Pages;

use App\Filament\Admin\Resources\ClipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClip extends EditRecord
{
    protected static string $resource = ClipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
