<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'image'];

    public function breadcrumbName()
    {
        return $this->title;
    }

//    public function posts()
//    {
//        return $this->hasMany(Post::class);
//    }

//    public function getParentAttribute()
//    {
//        return $this->where('parent_id', $this->id);
//    }
//
//    public function getChildsAttribute()
//    {
//        return $this->where('parent_id', $this->id);
//    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id' , 'id');
    }
}
