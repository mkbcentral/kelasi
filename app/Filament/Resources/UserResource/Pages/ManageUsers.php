<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Carbon\Carbon;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['school_id'] = auth()->user()->school->id;
                $data['password'] = bcrypt('password');
                $data['email_verified_at'] = Carbon::now();
                return $data;
            }),
        ];
    }
}
