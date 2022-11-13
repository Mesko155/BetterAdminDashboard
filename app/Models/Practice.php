<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'website',
        'logo'
    ];

    // Relation to Employee OtM
    public function employees() {
        return $this->hasMany(Employee::class);
    }

    // Relation to Fields MtM
    public function fields() {
        return $this->belongsToMany(Field::class)->withTimestamps();
    }
}
