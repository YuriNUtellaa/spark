<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMail extends Model
{
    protected $table = 'user_mail';

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'content',
    ];

    // Define relationships here if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

