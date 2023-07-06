<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * classe Suporte
 * @author Jefferson Lima Rodrigues
*/
class Suporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'assunto',
        'conteudo',
        'status'
    ];
}
