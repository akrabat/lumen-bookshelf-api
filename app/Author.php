<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * Fields that can be updated via update()
     */
    protected $fillable = ['name', 'biography'];

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
