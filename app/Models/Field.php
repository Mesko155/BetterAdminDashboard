<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;


    protected $fillable = [
        'tag'
    ];

    // Relation to Practice MtM
    public function practices() {
        return $this->belongsToMany(Practice::class)->withTimestamps();
    }
}
