<?php

namespace App\Filament\Resources\MyPostResource\Pages;

use App\Filament\Resources\MyPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateMyPost extends CreateRecord
{
    protected static string $resource = MyPostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = Auth::user();

        $data['user_id'] = $user->id;

        if ($user->hasRole('admin') || $user->hasRole('writer_without_approval')) {
            $data['status'] = 'published';
        } elseif ($user->hasRole('writer_with_approval')) {
            $data['status'] = 'draft';
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return Auth::user()->hasRole('admin') || Auth::user()->hasRole('writer_without_approval')
            ? 'Post published'
            : 'Your post has been successfully created and is awaiting approval or denial by an admin.';
    }

}
