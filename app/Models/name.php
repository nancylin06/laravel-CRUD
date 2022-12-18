<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class name extends Model
{
    use HasFactory;
    protected $tablel = 'name';
    protected $fillable = ['name','mobile_number','gender','place','likes','new'];
}
