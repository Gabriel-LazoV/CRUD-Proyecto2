<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Existencia extends Model
{
    use HasFactory;
    protected $table = 'existencias';
    protected $fillable = ['cantidad', 'ubicacion', 'producto_id'];
    public $timestamps = false;

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

}
