<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeGenerator extends Model
{
    protected $fillable = [
        'type', // Ajoutez 'type'
        'code', // Ajoutez 'code'
    ];
}
