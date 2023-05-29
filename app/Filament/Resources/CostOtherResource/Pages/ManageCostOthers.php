<?php

namespace App\Filament\Resources\CostOtherResource\Pages;

use App\Filament\Resources\CostOtherResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCostOthers extends ManageRecords
{
    protected static string $resource = CostOtherResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
