<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fireAlertAdmin extends Model
{
    use HasFactory;

    protected $table = "fire_alarm";
    protected $fillable = ['longitude', 'latitude', 'fire_location', 'status', 'user_id'];
}
