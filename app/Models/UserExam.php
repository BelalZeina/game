<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'exam_id',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the exam that belongs to the user.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
