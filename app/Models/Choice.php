<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    protected $table = 'choices';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'choice_text_2',
        'choice_text_3',
        'choice_text_4',
        'correct_choice',
        'user_id',
        'quiz_id',
        'question_id',
    ];
}

// class Choice extends Model
// {
//     public function question()
//     {
//         return $this->belongsTo(Question::class);
//     }
// }