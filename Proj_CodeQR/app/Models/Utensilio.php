<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utensilio extends Model
{
    use HasFactory;

    protected $table = 'utensilios';

    protected $fillable = [
        'uteNome',
        'quantidade',
        'resistencia',
    ];
}
