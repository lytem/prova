<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Specialty extends Model
{
    use HasFactory,SoftDeletes,Sortable;
    protected $fillable=['nome'];

    public function doctor(){
        return $this->hasMany(Doctor::class);
    }
    public function setNomeAttribute($value)//transaforme la premiere lettre en majuscule avant de sauve dans la base de donnees
    {
        $this->attributes['nome'] = ucfirst($value);
    }
    public function getNameAttribute($value)//transforme les donnees provenant de la bas de donnees
    {
    return ucfirst($value);
    }

}
