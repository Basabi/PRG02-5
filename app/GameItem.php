<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameItem extends Model
{
    //use Likable;
    protected $guarded = [];

    public $fillable = ['title', 'description', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
