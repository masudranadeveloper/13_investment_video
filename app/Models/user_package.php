<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user_package;

class user_package extends Model
{
    use HasFactory;
    protected $table = "02_user_packages";
    protected $primaryKey = "id";
}
