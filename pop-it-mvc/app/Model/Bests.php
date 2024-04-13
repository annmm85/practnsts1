<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bests extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'image'
    ];
}
