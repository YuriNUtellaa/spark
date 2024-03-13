<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\MonthlyPayment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'plate_number',
        'image',
    ];

    public function rentedSlot()
    {
        return $this->hasOne(Slot::class, 'user_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // RESERVATION PURPOSES ////////////////////////////
    // public function reservations()
    // {
    //     return $this->hasMany(Reservation::class);
    // }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // NEW
    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    public function userMails()
    {
        return $this->hasMany(UserMail::class);
    }

    public function monthlyPayments()
    {
        return $this->hasMany(MonthlyPayment::class);
    }
    public function latestPayment()
    {
        return $this->hasOne(MonthlyPayment::class)->latestOfMany();
    }

}
