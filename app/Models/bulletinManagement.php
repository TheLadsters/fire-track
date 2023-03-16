<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bulletinManagement extends Model
{
    use HasFactory;
    protected $table = "bulletin";
    protected $primaryKey = 'bulletin_id';
    protected $fillable = ['user_id', 'author_name', 'title', 'summary', 'article_url', 'img_url'];
    protected $dates = ['created_at', 'updated_at'];
    
}
