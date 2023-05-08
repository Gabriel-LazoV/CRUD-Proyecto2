<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exitencia extends Model
{
    use HasFactory;
    protected $table = 'existencias';
    public $timestamps = false;
}
