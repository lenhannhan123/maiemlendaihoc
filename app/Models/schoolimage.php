<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schoolimage extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    public $incrementing = false;
    protected $table = 'school_image';
    protected $primaryKey = 'ID_image ';
    protected $fillable = ['ID_image ', 'ID_school' ,'Image_name','description'];


}
