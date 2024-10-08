<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function executors()
    {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id');
    }
}
