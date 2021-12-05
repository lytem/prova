<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\columnSortable\Sortable;


class Appointment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['doctor_id','patient_id','data','ora','department_id','exam_id'];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function exam(){
        return $this->belongsTo(Exam::class);
    }


}
