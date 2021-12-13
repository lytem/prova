<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Doctor extends Model
{
    use HasFactory,SoftDeletes,Sortable;
    protected $fillable=['nome','cognome','partita_iva','codice_fiscale','telefono','email','residenza','città','specialty_id'];
    public function patient(){
        return $this->hasMany(Patient::class);
      }
      public function appointment(){
          return $this->hasMany(Appointment::class);
      }
      public function specialty(){
          return $this->belongsTo(Specialty::class);
      }
      public function setNomeAttribute($value)
      {
          $this->attributes['nome']= ucfirst($value);
      }
      public function setCognomeAttribute($value)
      {
          $this->attributes['cognome'] = ucfirst($value);
      }

}
