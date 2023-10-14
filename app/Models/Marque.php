<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $table = 'marque';

    public $timestamps = false;

    protected $fillable = [
        'nom',
    ];



    public function modeles()
    {
        return $this->hasMany(Modele::class, 'id_marque');
    }
}
