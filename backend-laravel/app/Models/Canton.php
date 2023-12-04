<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbrev',
        'img'
    ];

    public function villes()
    {
        return $this->hasOne(Canton::class);
    }
}
