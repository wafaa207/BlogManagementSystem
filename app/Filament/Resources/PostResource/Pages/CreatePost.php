<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePost extends CreateRecord
{
    public static string $resource = PostResource::class;
    
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}