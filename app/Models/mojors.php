<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mojors extends Model
{
    use HasFactory;

    use HasFactory;
    public $timestamps = FALSE;
    public $incrementing = false;
    protected $table = 'majors';
    protected $primaryKey = 'ID_majors';
    protected $fillable = ['ID_majors', 'ID_group_majors', 'name'];
    

}
