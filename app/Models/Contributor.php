<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
     protected $fillable = [
        'name', 'email', 'instagram', 'phone', 'birthdate', 'domicile', 'photo','attribution'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
