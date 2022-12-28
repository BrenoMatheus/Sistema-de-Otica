<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_at', 'updated_at', 'desc_categoria',
    ];

    public function produto() {
        return $this->ToMany('App\Models\Produto');
    }
    
}
