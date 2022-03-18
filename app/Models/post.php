<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table='posts';
    public function users()
    {
       return $this->belongsTo(user::class);
    }
    public function likes(){
        return $this->hasMany(like::class);
    }
}
