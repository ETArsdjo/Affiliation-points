<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class additionalMenue extends Model
{
    use HasFactory;
    protected $fillable = ['name_arabic', 'name_english', 'price']; // Define fillable attributes
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
