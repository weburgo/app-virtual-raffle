<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Model Contacts -> [name,phone,number] -> DATABASE
class Contacts extends Model
{
    protected $fillable = ['name','phone','number'];
}
