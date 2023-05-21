<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'marca', 'telefono', 'correo'];

    public function productosProveedor()
    {
        return $this->hasMany(Productos_Proveedor::class,'proveedor_id'); 
    }
    
}
