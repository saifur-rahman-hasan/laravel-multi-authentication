<?php

namespace App\Http\Requests\Admin;
// use App\Http\Requests\Admin\AdminCategoryStoreRequest;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (bool) (auth()->guard('admin')->check() && auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name'
        ];
    }
}