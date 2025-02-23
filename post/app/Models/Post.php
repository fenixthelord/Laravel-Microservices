<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected  $guarded = [];

    protected $attributes = [
        'comments' => "[]"
    ];

    public function getCommentsAttribute($value){
        return json_decode($value);
    }

    public function setCommentsAttribute($value){
        return $this->attributes['comments'] =  json_encode($value);
    }
}

