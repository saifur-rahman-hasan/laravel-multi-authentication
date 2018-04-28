<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminServiceQuestion extends Model
{
    protected $table = 'service_questions';
    protected $fillable = [
        'service_id',
        'question',
        'option_type',
        'options'
    ];

    public function setOptionsAttribute($options) 
    {
        $this->attributes['options'] = json_encode($options);
    }

    public function getOptionsAttribute($options) 
    {
        return json_decode($options);
    }
}
