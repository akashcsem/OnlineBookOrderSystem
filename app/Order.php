<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'user_id',
      'email',
      'name',
      'mobile',
      'total_price',
      'shipping_cost',
      'contact_person',
      'contact_mobile',
      'status',
      'feedback',
    ];
}
