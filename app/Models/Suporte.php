<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\SuporteStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    // protected $casts = [
    //     'status' => SuporteStatus::class
    // ];
    public function status(): Attribute
    {
        return Attribute::make(
            set: fn (SuporteStatus $status) => $status->name
        );
    }
}
