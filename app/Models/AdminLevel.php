<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'exam_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Get the exam that belongs to the user.
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
