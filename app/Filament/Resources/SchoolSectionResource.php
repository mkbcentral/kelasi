<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolSectionResource\Pages;
use App\Filament\Resources\SchoolSectionResource\RelationManagers;
use App\Models\SchoolSection;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SchoolSectionResource extends Resource
{
    protected static ?string $model = SchoolSection::class;

    protected static ?string $navigationIcon = 'heroicon-s-office-building';

    protected static ?string $navigationGroup = 'School manager';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('school_id', auth()->user()->school->id);
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
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('school.name'),
            ])
            ->filters([
                SelectFilter::make('Sections')->relationship('school','name')
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
            'index' => Pages\ManageSchoolSections::route('/'),
        ];
    }
}
