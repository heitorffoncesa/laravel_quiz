<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'uuid',
        'name',
        'description'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'category_id', 'id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'category_id', 'id');
    }
}
