<?php

namespace App\Filament\Resources\MyPostResource\Pages;

use App\Filament\Resources\MyPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyPost extends EditRecord
{
    protected static string $resource = MyPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
