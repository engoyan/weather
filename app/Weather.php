<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'weather';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['zip'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'json',
    ];
}
