<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClasseOptionResource\Pages;
use App\Filament\Resources\ClasseOptionResource\RelationManagers;
use App\Models\ClasseOption;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClasseOptionResource extends Resource
{
    protected static ?string $model = ClasseOption::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'School manager';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->join('school_sections','school_sections.id','=','classe_options.school_section_id')
            ->where('school_sections.school_id', auth()->user()->school->id)
            ->select('classe_options.*');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('school_section_id')
                    ->relationship('schoolSection', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('schoolSection.name'),
            ])
            ->filters([
                SelectFilter::make('Sections')->relationship('schoolSection','name')
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
            'index' => Pages\ManageClasseOptions::route('/'),
        ];
    }
}
