<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    public function author()
    {
        return $this->hasOne('App\Author', 'id', 'author_id');
    }

    public function getPathToImage()
    {
        if(!empty($this->image))
            return Storage::url($this->image);
    }
}
