<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catdespesa extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_at', 'updated_at', 'desc_cat_desp',
    ];
    public function despesa() {
        return $this->ToMany('App\Models\Despesa');
    }
}
