<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schoolmaojors extends Model
{
    use HasFactory;
    public $timestamps = FALSE;
    public $incrementing = false;
    protected $table = 'school_majors';
    protected $primaryKey = 'ID_school_majors';
    protected $fillable = ['ID_school_majors', 'ID_school' ,'ID_group_majors','ID_majors','ID_school_programs','Title','description','duration','Pace','Teaching_language','Tuition','study_type','benchmark','degree_type','recoverykey'];

}
