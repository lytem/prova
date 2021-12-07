<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Patient extends Model
{
    use HasFactory,SoftDeletes,Sortable;
    protected $fillable=['nome','cognome','partita_iva','codice_fiscale','telefono','email','residenza','città','doctor_id'];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
}
