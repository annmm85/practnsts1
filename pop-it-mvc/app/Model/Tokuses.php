<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tokuses extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'login',
        'token'
    ];
}
