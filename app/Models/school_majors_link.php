<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school_majors_link extends Model
{
    use HasFactory;


    public $timestamps = FALSE;
    public $incrementing = false;
    protected $table = 'school_majors_link';
    protected $primaryKey = 'ID_school_majors_link';
    protected $fillable = ['ID_school_majors_link', 'ID_school_majors','link'];

}
