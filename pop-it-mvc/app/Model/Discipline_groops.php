<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline_groops extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'groop_id',
        'discipline_id',
        'all_count_hour',
        'type_control',
    ];
}
