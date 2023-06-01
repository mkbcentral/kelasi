<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use App\Models\Inscription;
use App\Models\ScolaryYear;
use App\Models\User;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Select;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Pages\Actions\Action;

class ManageStudents extends ManageRecords
{
    protected static string $resource = StudentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['school_id'] = auth()->user()->school->id;
                $student = static::getModel()::create($data);
                $scolaryYear = ScolaryYear::where('is_active', true)->first();
                Inscription::create([
                    'student_id' => $student->id,
                    'classe_id' => $data['classe_id'],
                    'cost_inscription_id' => $data['cost_inscription_id'],
                    'scolary_year_id' => $scolaryYear->id
                ]);
                return $data;
            }),
            /*
            Action::make('updateAuthor')
                ->mountUsing(fn (ComponentContainer $form) => $form->fill([
                    //'authorId' => $this->record->author->id,
                ]))
                ->action(function (array $data): void {
                    $this->record->author()->associate($data['authorId']);
                    $this->record->save();
                })
                ->form([
                    Select::make('authorId')
                        ->label('Author')
                        ->options(User::query()->pluck('name', 'id'))
                        ->required(),
                ])
                */
        ];
    }
}
