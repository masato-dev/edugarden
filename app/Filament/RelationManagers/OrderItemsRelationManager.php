<?php
namespace App\Filament\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class OrderItemsRelationManager extends RelationManager {
    protected static string $relationship = 'orderItems'; // Tên hàm relation trong model Order

    protected static ?string $title = 'Sản phẩm trong đơn hàng';
    protected static ?string $recordTitleAttribute = 'id';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('book.thumbnail')
                    ->getStateUsing(fn ($record) => $record->book->thumbnail)
                    ->disk('public')
                    ->circular(),
                    
                Tables\Columns\TextColumn::make('book_id')
                    ->label('Tên sách')
                    ->getStateUsing(fn ($record) => $record->book->title),

                Tables\Columns\TextColumn::make('quantity')
                    ->label('Số lượng'),

                Tables\Columns\TextColumn::make('price')
                    ->label('Đơn giá')
                    ->money('VND', locale: 'vi'),

                Tables\Columns\TextColumn::make('total')
                    ->label('Thành tiền')
                    ->getStateUsing(fn ($record) => $record->price * $record->quantity)
                    ->money('VND', locale: 'vi'),
            ])
            ->headerActions([]) // Bỏ tạo mới
            ->actions([])       // Bỏ sửa
            ->bulkActions([]);  // Bỏ xoá
    }
}