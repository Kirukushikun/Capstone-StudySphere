<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'question_text',
        'quiz_id',
        'user_id',
    ];
}

// class Question extends Model
// {
//     public function choices()
//     {
//         return $this->hasMany(Choice::class);
//     }

//     public function quiz()
//     {
//         return $this->belongsTo(Quizzes::class);
//     }
// }
