<?php

namespace App;

use function App\Http\Helpers\price;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Casts\Json;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'image', 'description', 'extra_description', 'price', 'year', 'coach', 'post_id', 'duration', 'off', 'trainer_id'];

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

    public function getPriceAttribute($value)
    {
        return $value . " " . 'تومان';
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(' تومان', '', $value);
    }

//discount_price
    public function getDiscountPriceAttribute()
    {
        return price($this->price) - ($this->off / 100) * price($this->price);
    }


//    relations
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

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
//    end-relations


}
