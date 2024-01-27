<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
        protected $table = 'historial';
        protected $fillable = ['name','pregunta','acertado','respuesta'];
        public $timestamps = false;
}
