<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'ecusson',
        'population',
        'coord',
        'canton_id'
    ];


    public function canton()
    {
        return $this->belongsTo(Canton::class);
    }

    public function langues()
    {
        return $this->belongsToMany(Langue::class);
    }
}
