<?php

namespace App\Modules\Softnio\Models\Address;


use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id', 'address_line_one', 'address_line_two', 'state', 'country'];
}
