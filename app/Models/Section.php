<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'description', 'school_year'];

    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
