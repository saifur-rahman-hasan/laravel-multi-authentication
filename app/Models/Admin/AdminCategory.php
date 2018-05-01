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

    protected $appends = [
        'image_url'
    ];

    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = str_slug($slug);
    }

    public function getImage()
    {
        return (!empty($this->image)) ? asset('storage/images/categories/'.$this->image) : asset('assets/images/placeholder.jpg');
    }

    /*
    |--------------------------------------------------------------------------
    | Get A Specific category Image Url
    |--------------------------------------------------------------------------
    |
    | @return String [ Category Cover Image ]
    |
    */
    public function getImageUrlAttribute()
    {
        return $this->getImage();
    }

    /*
    |--------------------------------------------------------------------------
    | A Specific category has many services
    |--------------------------------------------------------------------------
    |
    | @return All the services which is belongs to this category
    |
    */
    public function services()
    {
        return $this->hasMany(AdminService::class, 'category_id', 'id');
    }
}
