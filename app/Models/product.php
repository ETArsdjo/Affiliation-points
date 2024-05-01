<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','name_arabic', 'name_english','image', 'product_descrption', 'quantity', 'price'];

 public function category()
{
    return $this->belongsTo(categories::class, 'category_id');
}
public function additionalMenues()
{
    return $this->hasMany(AdditionalMenue::class);
}
}