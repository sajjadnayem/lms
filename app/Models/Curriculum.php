<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Curriculum extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'week_day',
        'class_time',
        'end_date',
    ];
    protected $table = 'curriculums';
    use HasFactory;
    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }
    public function attendences()
    {
        return $this->hasMany(Attendence::class);
    }
    public function notes()
    {
        return $this->belongsToMany(Note::class, 'curriculum_note');
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
