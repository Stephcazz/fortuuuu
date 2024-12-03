<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientsResource\Pages;
use App\Models\Clients;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ClientsResource extends Resource
{
    protected static ?string $model = Clients::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pin')
                    ->required()
                    ->minLength(8)
                    ->maxLength(8),
                Forms\Components\TextInput::make('identifier')
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('iban')
                    ->required(),
                Forms\Components\TextInput::make('bic')
		    ->label('Référence')
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->required(),
                Forms\Components\TextInput::make('administrative_name')
                    ->required(),
                Forms\Components\TextInput::make('administrative_phone')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('operation_total')
                    ->required(),
                Forms\Components\TextInput::make('apport_total')
                    ->required(),
                Forms\Components\TextInput::make('financing_total')
                    ->required(),
                Forms\Components\Toggle::make('operation_active')
                    ->required(),
                Forms\Components\Toggle::make('apport_active')
                    ->required(),
                Forms\Components\Toggle::make('financing_active')
                    ->required(),
                Forms\Components\FileUpload::make('document')
                    ->required()
                    ->disk('public')
                    ->visibility('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('identifier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('iban')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bic')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('administrative_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('administrative_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('operation_total')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apport_total')
                    ->searchable(),
                Tables\Columns\TextColumn::make('financing_total')
                    ->searchable(),
                Tables\Columns\IconColumn::make('operation_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('apport_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('financing_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageClients::route('/'),
        ];
    }
}
