<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //______product validation rules______
            'name' => 'required',
            'code' => 'required',
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'childcategory_id' =>  'nullable',
            'brand_id' => 'nullable',
            'pickup_point_id' => 'nullable',
            'unit' => 'nullable',
            'tags' => 'nullable',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'discount_price' => 'nullable',
            'warehouse' => 'nullable',
            'stock_quantity' => 'required|numeric',
            'color' => 'nullable',
            'size' => 'nullable',
            'description' => 'nullable',
            'cash_on_delivery' => 'nullable',
            'featured' => 'nullable',
            'today_deal' => 'nullable',
            'status' => 'nullable',
            'thumbnail' => 'image|mimes:jpg,jpeg,png,gif,svg,webp|max:5024',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg,webp|max:5000',
            'video' => 'nullable|url',
        ];
    }
}
