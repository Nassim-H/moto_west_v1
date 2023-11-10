<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image';

    public $timestamps = false;

    protected $fillable = [
        'url',
        'id_piece',
    ];


    public function piece()
    {
        return $this->belongsTo(Piece::class, 'id_piece');
    }
}
