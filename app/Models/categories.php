<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = ['name_arabic', 'name_english', 'image'];

    public function sales()
    {
        return $this->hasMany(Sale::class, 'category_id');
    }
    
    // Sale model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
