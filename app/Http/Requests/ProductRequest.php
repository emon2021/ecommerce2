<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'code' => 'required|unique:products,code',
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'childcategory_id' =>  'nullable|exists:child_categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'pickup_point_id' => 'nullable|exists:pickup_points,id',
            'unit' => 'nullable',
            'tags' => 'nullable',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'discount_price' => 'numeric',
            'warehouse' => 'nullable',
            'stock_quantity' => 'required|integer',
            'color' => 'nullable',
            'size' => 'nullable',
            'description' => 'nullable',
            'cash_on_delivery' => 'nullable',
            'featured' => 'nullable',
            'today_deal' => 'nullable',
            'status' => 'nullable',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:5024',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'video' => 'nullable|url',
        ];
    }
}
