<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CostInscriptionResource\Pages;
use App\Filament\Resources\CostInscriptionResource\RelationManagers;
use App\Models\CostInscription;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CostInscriptionResource extends Resource
{
    protected static ?string $model = CostInscription::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Cost management';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->join('schools', 'schools.id', '=', 'cost_inscriptions.school_id')
            ->join('scolary_years', 'scolary_years.id', '=', 'cost_inscriptions.scolary_year_id')
            ->where('schools.id', auth()->user()->school->id)
            ->where('scolary_years.is_active',true)
            ->select('cost_inscriptions.*');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\ToggleColumn::make('is_active')->inline(),

            ])
            ->filters([
                //
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
            'index' => Pages\ManageCostInscriptions::route('/'),
        ];
    }
}
