<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CostOtherTypeResource\Pages;
use App\Filament\Resources\CostOtherTypeResource\RelationManagers;
use App\Models\CostOtherType;
use App\Models\ScolaryYear;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CostOtherTypeResource extends Resource
{
    protected static ?string $model = CostOtherType::class;

    protected static ?string $navigationIcon = 'heroicon-s-document-text';

    protected static ?string $navigationGroup = 'Cost management';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->join('schools', 'schools.id', '=', 'cost_other_types.school_id')
            ->join('scolary_years', 'scolary_years.id', '=', 'cost_other_types.scolary_year_id')
            ->where('cost_other_types.school_id', auth()->user()->school->id)
            ->where('scolary_years.is_active',true)
            ->select('cost_other_types.*');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
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
            'index' => Pages\ManageCostOtherTypes::route('/'),
        ];
    }
}
