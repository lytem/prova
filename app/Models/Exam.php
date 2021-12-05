<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['nome','costo'];


    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
}
