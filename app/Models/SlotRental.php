<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotRental extends Model
{
    use HasFactory;

    protected $fillable = [
        'slot_id',
        'start_time',
        'end_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // NEW
    public function slot()
    {
        return $this->belongsTo(Slot::class, 'slot_id');
    }
}
