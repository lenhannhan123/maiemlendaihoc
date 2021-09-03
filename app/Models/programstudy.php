<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programstudy extends Model
{
    use HasFactory;
    public $timestamps = FALSE;
    public $incrementing = false;
    protected $table = 'types_of_study_programs';
    protected $primaryKey = 'ID';
    protected $fillable = ['ID', 'Program_name'];
}
