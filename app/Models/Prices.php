<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        "id" => "integer",
        "value" => "float",
    ];
}
