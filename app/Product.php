<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Casts\Json;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'image' , 'description' , 'price' , 'year' , 'coach' , 'post_id'];

    public function breadcrumbName()
    {
        return $this->slug;
    }

    protected $casts = ['image' => Json::class];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

}
