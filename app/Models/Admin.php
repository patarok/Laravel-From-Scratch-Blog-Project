<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    
    use HasFactory;

    protected static function booted()
        {
            // This clears the cache entry the moment any Admin is created/updated/deleted
            static::saved(function () {
                Cache::forget('admin_usernames');
            });
    
            static::deleted(function () {
                Cache::forget('admin_usernames');
            });
        }
}
