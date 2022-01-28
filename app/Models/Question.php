<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'questions';

    protected $fillable = [
        'category_id',
        'user_id',
        'uuid',
        'title',
        'answers',
        'description'
    ];

     protected $dates = [
         'created_at',
         'updated_at',
         'deleted_at'
     ];

     public function category(): BelongsTo
     {
         return $this->belongsTo(Category::class, 'category_id', 'id');
     }

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'games_questions', 'question_id', 'game_id')
        ->withPivot('is_answered');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
