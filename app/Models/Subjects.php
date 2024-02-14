<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Subjects extends Model
{
    use HasFactory;
    protected $table='repository';
    // public $timestamps = false;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
        'id',
        'subject',
        'description',
        'user_id',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];
}
