<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminService extends Model
{
    protected $table = 'services';
    protected $fillable = [ 
        'name',
        'title',
        'sub_title',
        'description',
        'image',
        'category_id'
    ];

    public function getImage()
    {
        return (!empty($this->image)) ? asset('storage/images/services/'.$this->image) : asset('assets/images/backgrounds/seamless.png');
    }

    // Category Model
    public function category()
    {
        return $this->belongsTo(AdminCategory::class, 'category_id');
    }

    // Service Question Model
    public function questions()
    {
        return $this->hasMany(AdminServiceQuestion::class, 'service_id', 'id');
    }

}
