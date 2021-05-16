<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Astro extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Date',
        'fortuneAll',
        'fortuneAllNum',
        'fortuneLove',
        'fortuneLoveNum',
        'fortuneMoney',
        'fortuneMoneyNum',
        'fortuneBussWork',
        'fortuneBussWorkNum',
    ];

}
