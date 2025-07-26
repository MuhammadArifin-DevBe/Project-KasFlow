<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\CashReport;
use Filament\Tables\Table;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CashReportResource\Pages;
use App\Filament\Resources\CashReportResource\RelationManagers;

use function Laravel\Prompts\warning;

class CashReportResource extends Resource
{
    protected static ?string $model = CashReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('keterangan')->required(),
                        TextInput::make('kas_masuk')->numeric()->default(0),
                        TextInput::make('kas_keluar')->numeric()->default(0),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('keterangan')->sortable()->searchable(),
                TextColumn::make('kas_masuk')->sortable()->searchable(),
                TextColumn::make('kas_keluar')->sortable()->searchable(),
                // TextColumn::make('bukti')
                //     ->label('Kwitansi')
                //     ->formatStateUsing(fn($state) => $state ? 'Download' : '-')
                //     ->url(fn($record) => $record->bukti ? route('kwitansi.forceDownload', $record->id) : null)
                //     ->openUrlInNewTab(false),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('download')
                ->label('Download')
                ->color('info')
                ->icon('heroicon-o-arrow-down-tray')
                ->url(fn($record) => route('kwitansi.download', $record->id))
                ->openUrlInNewTab(false),
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
            'index' => Pages\ListCashReports::route('/'),
            'create' => Pages\CreateCashReport::route('/create'),
            'edit' => Pages\EditCashReport::route('/{record}/edit'),
        ];
    }
}
