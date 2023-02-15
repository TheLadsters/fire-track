<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fireHydrantAdmin extends Model
{
    use HasFactory;
    protected $table = "hydrant";
    protected $primaryKey = 'hydrant_id';
    protected $fillable = ['user_id', 'hydrant_type_id', 'longitude', 'latitude', 'status', 'img_url'];
}
