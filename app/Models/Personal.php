<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{

    protected $fillable = ['name', 'nim', 'image', 'alamat', 'role'];
}
