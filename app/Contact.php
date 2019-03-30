<?php

namespace App;

use App\ContactInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    use ContactInfo;

    protected $fillable = ['name','email','phone','country','city','state','zip'];
}
