<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\TagihanRumah;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TagihanRumahResource\Pages;
use App\Filament\Resources\TagihanRumahResource\RelationManagers;

class TagihanRumahResource extends Resource
{
    protected static ?string $model = TagihanRumah::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // ! MANAGE DATA
                Card::make()
                    ->schema([
                        TextInput::make('nama_tagihan')
                            ->label('Nama Tagihan')
                            ->placeholder('Nama tagihan')
                            ->required(),

                        DatePicker::make('bulan_tagihan')
                            ->label('Jatuh Tempo Tagihan')
                            ->rules(['date'])
                            ->displayFormat('d mm yy')
                            ->required()
                            ->placeholder('Pilih pilih tanggal tagihan')
                            ->reactive()
                            ->columnSpan([]),

                        Select::make('kategori_tagihan')
                            ->label('Ketegori Tagihan')
                            ->searchable()
                            ->options([
                                'Listrik' => 'Tagihan Listrik',
                                'Air' => 'Tagihan Air',
                                'Internet' => 'Tagihan Internet',
                                'Telephone' => 'Tagihan Telephone'
                            ]),

                        TextInput::make('jumlah_tagihan')
                            ->label('Total Tagihan Bulanan')
                            ->placeholder('Jumlah dari total tagihan bulanan')
                            ->required()
                            ->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: 'Rp ', thousandsSeparator: '.', decimalPlaces: 2, isSigned: false)),

                        TextInput::make('total_tagihan')
                            ->label('Jumlah Tagihan')
                            ->placeholder('Jumlah dari tagihan')
                            ->required()
                            ->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: 'Rp ', thousandsSeparator: '.', decimalPlaces: 2, isSigned: false)),

                        DatePicker::make('tanggal_bayar')
                            ->rules(['date'])
                            ->displayFormat('d mm Y')
                            ->required()
                            ->placeholder('Tanggal Pembayaran Tagihan')
                            ->reactive()
                            ->columnSpan([]),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ! SHOW DATA
                TextColumn::make('nama_tagihan')->searchable(),
                TextColumn::make('kategori_tagihan')->sortable()->searchable(),
                TextColumn::make('total_tagihan')->money('idr'),
                TextColumn::make('jumlah_tagihan')->money('idr'),
                TextColumn::make('bulan_tagihan')->sortable()->searchable(),
                TextColumn::make('tanggal_bayar')->sortable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTagihanRumahs::route('/'),
            'create' => Pages\CreateTagihanRumah::route('/create'),
            'edit' => Pages\EditTagihanRumah::route('/{record}/edit'),
        ];
    }
}
