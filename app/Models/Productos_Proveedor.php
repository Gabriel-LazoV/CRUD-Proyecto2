<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos_Proveedor extends Model
{
    use HasFactory;
    protected $fillable = ['producto_id','proveedor_id'];
// relaciones inversas
    public function producto()
    {
        return $this->belongsTo(Productos::class,'producto_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }


}
