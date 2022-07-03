<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    use HasFactory;
    protected $fillable = [
        'mensaje',
        'user_id',
        'post_id',
    ];

    public function user(){
        return  $this->belongsTo(User::class)->withDefault();
    }

    public function post(){
        $this->belongsTo(Post::class)->withDefault();
    }
}
