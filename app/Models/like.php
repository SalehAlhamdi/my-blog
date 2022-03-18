<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;
    protected $table='likes';
    public $timestamps = false;
    public function posts(){
        $this->belongsTo('posts');
    }
}
