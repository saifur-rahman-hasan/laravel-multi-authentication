<?php

use Illuminate\Database\Seeder;

// Models
use App\Models\Admin\AdminCategory;

class CategoriesCreate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ 
            'Technology', 
            'Graphics and Design', 
            'Marketing and Promotion', 
            'Accounting', 
            'Animation', 
            'Consultation'
        ];

        foreach ($categories as $key => $category) {
            AdminCategory::create([
                'name'  =>  $category,
                'slug'  =>  str_slug($category),
                'created_by_id' => 1
            ]);
        }
    }
}
