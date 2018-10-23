<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'message', 'unread'];
}
