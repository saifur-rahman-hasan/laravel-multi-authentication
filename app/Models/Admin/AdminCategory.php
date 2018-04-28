<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminCategory extends Model
{
    protected $table = 'categories';
    protected $fillable = [ 
        'name',
        'slug',
        'description',
        'image',
        'created_by_id' 
    ];
    
    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = str_slug($slug);
    }

    public function getImage()
    {
        return (!empty($this->image)) ? asset('storage/images/categories/'.$this->image) : asset('assets/images/placeholder.jpg');
    }
}
