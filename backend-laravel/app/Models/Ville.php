<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Ville",
 *     type="object",
 *     @OA\Property(
 *         property="name",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="img",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="ecusson",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="population",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="coord",
 *         type="string"
 *     ),
 *     @OA\Property(
 *         property="canton_id",
 *         type="int"
 *     )
 * )
 */
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
        return $this->belongsToMany(Langue::class, 'langues_villes', 'ville_id', 'langue_id');
    }
}
