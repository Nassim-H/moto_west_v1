<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localisation extends Model
{
    use HasFactory;
    protected $table = 'localisation';


    public $timestamps = false;

    protected $fillable = [
        'pays',
        'ville',
        'lieu'
    ];

    public function pieces()
    {
        return $this->hasMany(Piece::class, 'id_localisation');
    }
}
