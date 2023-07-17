<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['sender', 'receiver', 'amount', 'number', 'type', 'client_name', 'client_prof', 'prodID'];
}
