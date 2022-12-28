<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    protected $dates = ['data'];
    protected $guarded = [];
    public function despesa() {
        return $this->hasMany(Despesa::class);
    }
    public function paciente() {
        return $this->hasMany(Pacient::class);
    }
    public function venda() {
        return $this->hasMany(Venda::class);
    }

}
