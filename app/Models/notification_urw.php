<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification_urw extends Model
{
    use HasFactory;
    protected $table = "07_notification_urws";
    protected $primaryKey = "id";
}
