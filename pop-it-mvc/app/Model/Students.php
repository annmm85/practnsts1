<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'birthdate',
        'adress',
        'groop_id'
    ];
}
