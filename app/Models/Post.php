<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'content',
        'photo',
        'slug' ,
        'user_id'
    ];

    public function user()
   {
       return $this->belongsTo('App\Models\User', 'user_id' );
   }

   public function tag()
    {
        return $this->belongsToMany('App\Models\Tag');
    }



}
