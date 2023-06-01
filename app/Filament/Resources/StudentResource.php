<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Classe;
use App\Models\CostInscription;
use App\Models\Inscription;
use App\Models\ScolaryYear;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Notifications\Notification;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $navigationGroup = 'Inscription';
    protected static ?string $navigationIcon = 'heroicon-s-folder';
    protected static ?string $navigationLabel = 'Liste of student';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code'),
                Forms\Components\TextInput::make('name'),
                Forms\Components\Select::make('gender')
                    ->label('Gender')
                    ->options([
                        'M' => 'Masculin',
                        'F' => 'Féminin'
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('date_of_birth'),
                Forms\Components\Select::make('classe_id')
                    ->label('Classes')
                    ->options(Classe::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('cost_inscription_id')
                    ->label('Classes')
                    ->options(CostInscription::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->slideOver(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('Create user')
                    ->action(function (array $data, Student $record): void {
                        $data['student_id'] = $record->id;
                        $scolaryYear = ScolaryYear::where('is_active', true)->first();
                        $data['scolary_year_id'] = $scolaryYear->id;
                        $inscription = Inscription::where('student_id', $record->id)
                            ->where('scolary_year_id', $scolaryYear->id)
                            ->first();
                        if ($inscription) {
                            Notification::make()
                                ->danger()
                                ->title('Notification')
                                ->body('The student have a inscription !')
                                ->send();
                        } else {
                            Inscription::create($data);
                            Notification::make()
                                ->success()
                                ->title('Notification')
                                ->body('Inscription saved succeffull.')
                                ->send();
                        }
                    })
                    ->form([
                        Placeholder::make('Label'),
                        Select::make('classe_id')
                            ->label('Classes')
                            ->options(Classe::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Select::make('cost_inscription_id')
                            ->label('Cost')
                            ->options(CostInscription::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                    ]),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageStudents::route('/'),
        ];
    }
}
