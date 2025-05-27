<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable implements FilamentUser
{
    use Notifiable;

    protected $guarded = [];

    // Cho phép login
    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return true; // hoặc kiểm tra điều kiện gì đó nếu cần
    }
}
