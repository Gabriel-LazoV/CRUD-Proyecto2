<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['marca', 'categoria', 'folio'];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}
