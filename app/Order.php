<?php

namespace App;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'total', 'status', 'refID', 'address', 'authority'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getCreatedAtAttribute($value)
    {
        $v = new Verta($value);
        return $v->format('Y-m-d') . " (" . $v->formatWord('l') . ")";
    }

}
