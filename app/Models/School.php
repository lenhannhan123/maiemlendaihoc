<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;


    public $timestamps = FALSE;
    public $incrementing = false;
    protected $table = 'school_formation';
    protected $primaryKey = 'id_school';
    protected $fillable = ['id_school', 'name_school' ,'logo','address','area','area','School_Introduction','School_type','lat','lng','website'];
}
