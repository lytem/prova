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
}
