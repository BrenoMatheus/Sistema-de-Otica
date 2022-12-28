<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;
    protected $dates = ['data'];
    protected $guarded = [];
    public function categoria() {
        return $this->belongsTo(catdespesa::class, 'catdespesa_id', 'id');
    }
    public function locals_desp() {
        return $this->belongsTo(Local::class, 'local_id', 'id');
    }
}
