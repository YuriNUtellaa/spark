<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'slots';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slot_number', 'status', 'start_time']; // Add start_time to fillable fields

    public function renter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
