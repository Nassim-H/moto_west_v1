<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

    protected $table = 'modele';

    public $timestamps = false;

    protected $fillable = [
        'nom',
        'cylindree',
        'id_marque',
    ];

    public function marque()
    {
        return $this->belongsTo(Marque::class, 'id_marque');
    }

    public function pieces()
    {
        return $this->hasMany(Piece::class, 'id_modele');
    }

}
