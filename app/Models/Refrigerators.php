<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refrigerators extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function prices()
    {
        return $this->hasMany(Prices::class)->orderBy("date");
    }

    public function getTotalAttribute()
    {
        return $this->prices->sum(function (Prices $price) {
            return $price->value;
        });
    }
}
