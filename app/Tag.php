<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name' , 'link'];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
