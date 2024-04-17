<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar', 'name_eng', 'note', 'quantity', 'price'];

    public function category()
    {
        return $this->belongsTo(categories::class);
    }
}
