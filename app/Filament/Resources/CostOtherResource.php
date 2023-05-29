<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CostOtherResource\Pages;
use App\Filament\Resources\CostOtherResource\RelationManagers;
use App\Models\CostOther;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CostOtherResource extends Resource
{
    protected static ?string $model = CostOther::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Cost management';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->join('cost_other_types', 'cost_other_types.id', '=', 'cost_others.cost_other_type_id')
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
                Forms\Components\Select::make('cost_other_type_id')
                    ->relationship('costOtherType', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('amount')->alignCenter(),
                Tables\Columns\TextColumn::make('costOtherType.name'),
                Tables\Columns\ToggleColumn::make('is_active')->inline(),
            ])
            ->filters([
                SelectFilter::make('Types')->relationship('costOtherType','name')
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
            'index' => Pages\ManageCostOthers::route('/'),
        ];
    }
}
