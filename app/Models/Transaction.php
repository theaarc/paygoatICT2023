<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, >
     */

    protected $table = 'transaction';

    protected $fillable = [
        'sender',
        'reciever',
        'montant',
        'date',
        'type',
    ];

    protected $casts = [
        'sender' => 'integer',
        'reciever' => 'integer',
        'montant' => 'float',
        'date' => 'date',
        'type' => 'string',
    ];

}
