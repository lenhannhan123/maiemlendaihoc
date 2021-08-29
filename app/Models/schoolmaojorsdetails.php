<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schoolmaojorsdetails extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    public $incrementing = false;
    protected $table = 'school_majors_detail';
    protected $primaryKey = 'ID_School_majors_detail';
    protected $fillable = ['ID_School_majors_detail', 'ID_school_majors' ,'Introduce','Admissions','details','Result','Career_opportunities'];



}
