<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    protected $casts = [
        'doencas' => 'array'
    ];
  

    protected $dates = ['data'];
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
    public function examePAC(){
        return $this->hasMany('App\Models\Exame');
    }
    public function venda(){
        return $this->hasMany('App\Models\Venda');
    }
    public function local(){
        return $this->belongsTo(Local::class);
    }
    
}
