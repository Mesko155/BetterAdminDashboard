<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'practice_id',
        'email',
        'phone'
    ];

    // Relation to Practice MtO
    public function practice() {
        return $this->belongsTo(Practice::class);
    }
}
