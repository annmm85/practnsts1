<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplines extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'course_id',
        'semester_id'
    ];
}
