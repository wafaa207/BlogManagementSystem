<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }


    protected function getCreatedNotificationTitle(): ?string
    {
        return 'User Created';
    }


    protected function afterCreate(): void
    {
        $user = $this->record;

        if ($this->form->getState()['role']) {
            $user->assignRole($this->form->getState()['role']);
        }
    }
}
