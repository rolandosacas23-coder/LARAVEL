<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ContactoFactory;

class contacto extends Model
{
    use HasFactory;

    public function eventos(){
        $this->hasMany(contacto::class);
    }
    public function notas(){
        $this->hasMany(contacto::class);
    }
}
