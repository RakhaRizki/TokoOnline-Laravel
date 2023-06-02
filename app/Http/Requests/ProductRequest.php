<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer'
        ];
    }
}
