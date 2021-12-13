<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable;
use Kyslik\ColumnSortable\Sortable;

class Department extends Model
{
    use HasFactory,SoftDeletes,Sortable;
    protected $fillable=['nome','indirizzo','telefono','email'];


    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
    public function setNomeAttribute($value)
      {
          $this->attributes['nome']= ucfirst($value);
      }


}
