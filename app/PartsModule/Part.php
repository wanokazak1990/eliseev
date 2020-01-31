<?php

namespace App\PartsModule;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    public function getRoubleAttribute()
    {
        return number_format($this->price,0,'',' ').' руб.';
    }

    public function getFullCountAttribute()
    {
        return $this->count.' '.$this->unit;
    }
}
