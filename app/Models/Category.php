<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'percentage'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }
}
