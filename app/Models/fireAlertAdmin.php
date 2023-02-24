<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fireAlertAdmin extends Model
{
    use HasFactory;

    protected $table = "fire_alarm";
    protected $primaryKey = 'firealarm_id';
    protected $fillable = ['user_id', 'longitude', 'latitude', 'fire_location', 'status'];
    protected $dates = ['created_at'];
}
