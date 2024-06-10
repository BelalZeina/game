<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['level_id', 'admin_id', 'time'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_exams')
                    ->withPivot('score')
                    ->withTimestamps();
    }
}
