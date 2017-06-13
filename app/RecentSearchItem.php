<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentSearchItem extends Model
{
    public $timestamps = false;
    protected $fillable = ['search_term', 'search_date'];

    protected $dates = ['search_date'];
}
