<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPayment extends Model
{
    use HasFactory;

    protected $table = 'monthly_payments';

    protected $fillable = [
        'user_id',
        'month',
        'method',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Define relationships here if needed
}
