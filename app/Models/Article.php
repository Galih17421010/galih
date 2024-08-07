<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'category_id','title','slug','body','image','published_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
