<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school_majors_image extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    public $incrementing = false;
    protected $table = 'school_majors_detail_image';
    protected $primaryKey = 'ID_image';
    protected $fillable = ['ID_image', 'ID_school_majors_detail','Image_name','description'];
}
