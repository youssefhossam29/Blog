<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'city',
        'photo',
        'gender',
        'bio',
        'facebook' ,
        'user_id'
    ];

    /**
     * Get the user that owns the profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
   {
       return $this->belongsTo('App\Models\User', 'user_id' );
   }

}
