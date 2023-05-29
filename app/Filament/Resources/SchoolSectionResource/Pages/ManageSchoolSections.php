<?php

namespace App\Filament\Resources\SchoolSectionResource\Pages;

use App\Filament\Resources\SchoolSectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSchoolSections extends ManageRecords
{
    protected static string $resource = SchoolSectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['school_id'] = auth()->user()->school->id;
                return $data;
            }),
        ];
    }
}
