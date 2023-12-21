<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    use HasFactory;

    public function Categories()
    {
        return $this->belongsTo(Categoria::class,'category_id');
    }
}
