<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $primaryKey = 's_id';
    protected $fillable = [
        's_id',
        's_name',
        's_dob',
        's_from',
        's_status',
        's_school_name',
        's_register_date',
        's_fname',
        's_fdob',
        's_fjob',
        's_mname',
        's_mdob',
        's_mjob',
        'subject_id',
        'score_id',
        'attendance_id',
        'grade_id',
    ];
}