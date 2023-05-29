<?php

namespace App\Filament\Resources\CostOtherTypeResource\Pages;

use App\Filament\Resources\CostOtherTypeResource;
use App\Models\ScolaryYear;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCostOtherTypes extends ManageRecords
{
    protected static string $resource = CostOtherTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $scolaryYear=ScolaryYear::where('is_active',true)->first();
                $data['school_id'] = auth()->user()->school->id;
                $data['scolary_year_id'] = $scolaryYear->id;
                return $data;
            }),
        ];
    }
}
