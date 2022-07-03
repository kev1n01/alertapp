<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'multimedia',
        'user_id',
        'category_id',
        'ubicacion',
    ];
    public function commentary(){
        return $this->hasMany(Commentary::class);
    }
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

