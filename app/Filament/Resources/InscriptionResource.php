<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InscriptionResource\Pages;

use App\Models\Inscription;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InscriptionResource extends Resource
{
    protected static ?string $model = Inscription::class;
    protected static ?string $navigationGroup = 'Inscription';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'New inscription';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->relationship('student', 'name')
                    ->required(),
                Forms\Components\Select::make('classe_id')
                    ->relationship('classe', 'name')
                    ->required(),
                Forms\Components\Select::make('cost_inscription_id')
                    ->relationship('costInscription', 'name')
                    ->required(),
                Forms\Components\Select::make('scolary_year_id')
                    ->relationship('scolaryYear', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->date('d/M/Y')->label('Inscripted at')
                    ->sortable(),
                Tables\Columns\TextColumn::make('student.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('classe.name'),
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_at')->default(now()),
                    ]),
                    SelectFilter::make('Classes')->relationship('classe','name')->searchable()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageInscriptions::route('/'),
        ];
    }
}
