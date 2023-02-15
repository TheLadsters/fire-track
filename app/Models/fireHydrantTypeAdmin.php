<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fireHydrantTypeAdmin extends Model
{
    use HasFactory;
    protected $table = "hydrant_type";
    protected $primaryKey = 'hydrant_type_id';
    protected $fillable = ['name', 'img_url'];
}
