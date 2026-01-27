<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'birth_date', 'email', 'contact_number'];

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
