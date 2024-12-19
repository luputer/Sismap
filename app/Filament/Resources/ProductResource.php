<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->label('Kategori'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100)
                    ->label('Nama Produk'),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(20)
                    ->label('Kode Produk'),
                Forms\Components\TextInput::make('barcode')
                    ->maxLength(50)
                    ->label('Barcode'),
                Forms\Components\Textarea::make('description')
                    ->maxLength(255)
                    ->label('Deskripsi'),
                Forms\Components\TextInput::make('unit')
                    ->required()
                    ->label('Satuan'),
                Forms\Components\TextInput::make('purchase_price')
                    ->required()
                    ->numeric()
                    ->label('Harga Beli'),
                Forms\Components\TextInput::make('selling_price')
                    ->required()
                    ->numeric()
                    ->label('Harga Jual'),
                Forms\Components\TextInput::make('min_stock')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->label('Stok Minimum'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true),
                // Add Supplier Select Field
                Forms\Components\Select::make('supplier_id')
                    ->relationship('supplier', 'name')  // Relationship to Supplier model
                    ->required()
                    ->label('Supplier'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori'),
                Tables\Columns\TextColumn::make('supplier.name') // Display Supplier Name
                    ->label('Supplier'),
                Tables\Columns\TextColumn::make('current_stock')
                    ->label('Stok')
                    ->sortable(),
                Tables\Columns\TextColumn::make('purchase_price')
                    ->money('idr')
                    ->label('Harga Beli'),
                Tables\Columns\TextColumn::make('selling_price')
                    ->money('idr')
                    ->label('Harga Jual'),
                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Status'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
