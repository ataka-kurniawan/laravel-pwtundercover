<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $casts = [
    'published_at' => 'datetime',
];
    protected $fillable = [
        'contributor_id',
        'user_id',
        'category_id',
        'title',
        'content',
        'thumbnail',
        'status',
        'position',
        'published_at',
    ];

    

    public function contributor()
    {
        return $this->belongsTo(Contributor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
