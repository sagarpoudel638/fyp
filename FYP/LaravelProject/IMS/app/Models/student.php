<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = ['StudentName','Address','PrimaryNumber','Email','Gender','user_id','course_id'];
}
