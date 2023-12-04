<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['name','news_category_id','description','photo','featured'];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
    public function newscategory() {
        return $this->belongsTo(NewsCategory::class,'news_category_id');
    }
}
