<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'project_url', 'start_date','end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
