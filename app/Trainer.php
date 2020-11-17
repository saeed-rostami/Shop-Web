<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    use  SoftDeletes;
    protected $fillable = ['name' , 'image'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
