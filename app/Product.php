<?php

namespace App;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'image', 'description', 'extra_description', 'price', 'year', 'coach', 'category_id', 'duration', 'off', 'trainer_id'];

    protected $appends = ['discount_price'];

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

//    public function getPriceAttribute($value)
//    {
//        return $value . " " . 'تومان';
//    }

//    public function setPriceAttribute($value)
//    {
//        $this->attributes['price'] = str_replace(' تومان', '', $value);
//    }

//discount_price
    public function getDiscountPriceAttribute()
    {
        return $this->price - ($this->off / 100) * $this->price;
    }


//    relations
    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id' , 'id');
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

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
//    end-relations


}
