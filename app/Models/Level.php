<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable=["name_ar","name_en"];
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function getNameAttribute()
    {
        return $this->attributes['name_' . app()->getLocale()];
    } // end getNameAttribute

    public function admins()
    {
        return  $this->belongsToMany(Admin::class, 'admin_levels')
        ->withTimestamps();
    }
}
