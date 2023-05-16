<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonResource\Pages;
use App\Filament\Resources\PersonResource\RelationManagers;
use App\Models\Curriculum;
use App\Models\Person;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonResource extends Resource
{
    protected static ?string $model = Person::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Nombre')
                    ->autofocus()
                    ->required()
                    ->minLength(3)
                    ->maxLength(35)
                    ->placeholder('Ingrese su nombre')
            ->helperText('Escribe solamente tu nombre.'),
                TextInput::make('Apellido')
                    ->autofocus()
                    ->required()
                    ->minLength(3)
                    ->maxLength(35)
                    ->placeholder('Ingrese su apellido')
                    ->helperText('Escribe solamente tu apellido.'),
                TextInput::make('Correo')
                    ->autofocus()
                    ->email()
                    ->required()
                    ->placeholder('Ingrese su correo')
                    ->helperText('Escribe tu correo electrónico.'),
                TextInput::make('Documento')
                    ->autofocus()
                    ->numeric()
                    ->required()
                    ->minLength(6)
                    ->maxLength(12)
                    ->placeholder('Ingrese su documento')
                    ->helperText('Escribe el número del documento de identidad.'),
                DatePicker::make('Fecha de nacimiento')
                    ->autofocus()
                    ->required()
                    ->minDate(now()->subYears(80))
                    ->maxDate(now())
                    ->placeholder('Seleccione su fecha de nacimiento'),
                Select::make('Curriculum')
                    ->autofocus()
                    ->required()
                    ->placeholder('Seleccione su carrera')
                    ->helperText('Seleccione su programa curricular.')
                    ->options(Curriculum::all()->pluck('title', 'id'))
                    ->searchable(),
                TextInput::make('contraseña')
                    ->autofocus()
                    ->password()
                    ->minLength(8)
                    ->maxLength(35)
                    ->autocomplete('new-password')
                    ->required()
                    ->placeholder('Ingrese su contraseña')
                    ->helperText('Crea una contraseña.'),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('document', 'Documento')->searchable(),
                TextColumn::make('date_of_birth', 'Fecha de nacimiento')->date(),
                TextColumn::make('id_curriculum', 'Curriculum'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePerson::route('/create'),
            'edit' => Pages\EditPerson::route('/{record}/edit'),
        ];
    }
}
