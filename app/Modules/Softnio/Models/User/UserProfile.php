<?php

namespace App\Modules\Softnio\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id', 'gender', 'phone_number', 'date_of_birth', 'state', 'country_id', 'is_correct'
    ];
}
