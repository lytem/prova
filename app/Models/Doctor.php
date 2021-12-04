<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
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

}
