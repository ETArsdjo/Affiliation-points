<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'quantity',
        'amount',
        'sale_date',
    ];

    /**
     * Get the category associated with the sale.
     */
    public function category()
    {
        return $this->belongsTo(categories::class);
    }
}
