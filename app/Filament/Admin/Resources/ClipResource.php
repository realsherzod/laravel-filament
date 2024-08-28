<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ClipResource\Pages;
use App\Filament\Admin\Resources\ClipResource\RelationManagers;
use App\Models\Clip;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClipResource extends Resource
{
    protected static ?string $model = Clip::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            FileUpload::make('video')
                ->label('Upload Video')
                ->directory('videos')
                ->disk('public')
                ->acceptedFileTypes(['video/mp4', 'video/mkv', 'video/avi'])
                ->maxSize(102400) // Set max upload size to 20 MB
                ->preserveFilenames()
                ->required(),
            Forms\Components\Toggle::make('is_active')
                ->label('Is Active')
                ->required(),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('video')
                ->label('Video')
                ->searchable(),
            Tables\Columns\IconColumn::make('is_active')
                ->label('Active')
                ->boolean(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Updated At')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListClips::route('/'),
            'create' => Pages\CreateClip::route('/create'),
            'edit' => Pages\EditClip::route('/{record}/edit'),
        ];
    }
}
