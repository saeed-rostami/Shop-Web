<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Casts\Json;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'image', 'description', 'extra_description', 'price', 'year', 'coach', 'post_id', 'duration', 'off' , 'trainer_id'];

    public function breadcrumbName()
    {
        return $this->slug;
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    protected $casts = ['image' => Json::class];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }


}
