<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClasseResource\Pages;
use App\Filament\Resources\ClasseResource\RelationManagers;
use App\Models\Classe;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClasseResource extends Resource
{
    protected static ?string $model = Classe::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'School manager';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->join('classe_options','classe_options.id','=','classes.classe_option_id')
            ->join('school_sections','school_sections.id','=','classe_options.school_section_id')
            ->where('school_sections.school_id', auth()->user()->school->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('classe_option_id')
                    ->relationship('classeOption', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('classeOption.name'),
            ])
            ->filters([
                SelectFilter::make('Options')->relationship('classeOption','name')
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
            'index' => Pages\ManageClasses::route('/'),
        ];
    }
}
