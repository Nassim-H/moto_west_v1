<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $table = 'piece';

    public $timestamps = false;

    protected $fillable = [
        'nom',
        'quantite',
        'prix',
        'id_modele',
        'id_localisation',
    ];

    public function modele()
    {
        return $this->belongsTo(Modele::class, 'id_modele');
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class, 'id_localisation');
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class, 'id_marque');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'id_piece');
    }
}
