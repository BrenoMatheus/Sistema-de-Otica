<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
    protected $casts = [
        'compra' => 'array'
    ];

    protected $dates = ['data','data_entrega'];
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
    public function exa() {
        return $this->belongsTo('App\Models\Exame');
    }
    public function pac() {
        return $this->belongsTo(Pacient::class, 'pacient_id', 'id');
    }    
    public function local() {
        return $this->belongsTo(Local::class)->withDefault();
    }
}
