<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable=['nome','indirizzo','telefono','email','exam_id'];

    public function exam(){
        return $this->belongsTo(exam::class);
    }
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
}
