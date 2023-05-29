<?php

namespace App\Filament\Resources\ClasseResource\Pages;

use App\Filament\Resources\ClasseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageClasses extends ManageRecords
{
    protected static string $resource = ClasseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
