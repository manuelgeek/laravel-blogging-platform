<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

//    const CREATED_AT = 'publication_date';

    protected $fillable = ['title', 'slug', 'description', 'user_id', 'created_at'];

    protected $with = ['user'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(User::class);
    }
}
