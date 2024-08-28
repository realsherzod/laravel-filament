<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CatalogResource\Pages;
use App\Filament\Admin\Resources\CatalogResource\RelationManagers;
use App\Models\Catalog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CatalogResource extends Resource
{
    protected static ?string $model = Catalog::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_uz')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_ru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_uz')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_ru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_en')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextArea::make('description_uz')
                    ->required()
                    ->rows(5)
                    ->maxLength(1000),
                Forms\Components\TextArea::make('description_ru')
                    ->required()
                    ->rows(5)
                    ->maxLength(1000),
                Forms\Components\TextArea::make('description_en')
                    ->required()
                    ->maxLength(1000)
                    ->rows(5),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->directory('catalog-images')->image()->disk('public'),
                Forms\Components\FileUpload::make('second_image')
                    ->image()
                    ->required()
                    ->directory('catalog-images')->image()->disk('public'),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_uz')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_uz')
                    ->searchable(),
  
                Tables\Columns\ImageColumn::make('image'),
           
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCatalogs::route('/'),
            'create' => Pages\CreateCatalog::route('/create'),
            'edit' => Pages\EditCatalog::route('/{record}/edit'),
            'view' => Pages\ViewCatalog::route('/{record}'),
        ];
    }
}
