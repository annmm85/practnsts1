<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'discipline_groop_id',
        'student_id',
        'mark',
    ];
}
