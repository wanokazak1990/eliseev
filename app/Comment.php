<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'username','useremail','title','text'
    ];

    public function getCreateDateAttribute()
    {
        return $this->created_at->format('d.m.Y');
    }
}
