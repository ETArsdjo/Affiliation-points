<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'branch_id',
        ];
        public function user()
        {
            return $this->belongsTo(User::class, 'employee_id');
        }
    
        public function branch()
        {
            return $this->belongsTo(Branch::class, 'branch_id');
        }
}
