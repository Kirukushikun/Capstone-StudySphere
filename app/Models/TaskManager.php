<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TaskManager extends Model
{   
    protected $table = 'task_manager';
    public $timestamps = false;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subject',
        'due_date',
        'priority',
        'status',
        'user_id',
    ];

    /**
     * Get the user that owns the task.
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}

