<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupmajors extends Model
{
    use HasFactory;
    public $timestamps = FALSE;
    public $incrementing = false;
    protected $table = 'group_majors';
    protected $primaryKey = 'ID_group_major';
    protected $fillable = ['ID_group_major', 'name'];
}
