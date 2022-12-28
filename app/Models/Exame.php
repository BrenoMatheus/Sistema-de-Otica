<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;
    
    protected $casts = [
        'diagnostico' => 'array',
        'dir_longe' => 'array',
        'dir_perto' => 'array',
        'esq_longe' => 'array',
        'esq_perto' => 'array',
        'indicacao' => 'array'
    ];

    protected $dates = ['data'];
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
    public function paciente() {
        return $this->hasMany('App\Models\Pacient','id','pacient_id');
    }
    public function pacientes(){
        return $this->belongsToMany(related:Pacient::class);
    }
    public function venda(){
        return $this->hasMany('App\Models\Venda');
    }
    public function local(){
        return $this->belongsTo('App\Models\Local');
    }
   
}

