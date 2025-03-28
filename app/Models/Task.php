<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

final class Task extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'priority', 'status', 'due_date'];

    protected $casts = [
        'public_token_expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getShortNameAttribute()
    {
        return Str::limit($this->attributes['name'], 20);
    }

    public function getShortDescriptionAttribute()
    {
        return Str::limit($this->attributes['description'], 10);
    }
}
