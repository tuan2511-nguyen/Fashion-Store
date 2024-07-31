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
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'sizes' => 'required|array',
            'sizes.*' => 'exists:sizes,id',
            'colors' => 'required|array',
            'colors.*' => 'exists:colors,id',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.stock_quantity' => 'required|integer|min:0',
            'images_url.*' => 'mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'product_name.required' => 'Tên sản phẩm là bắt buộc.',
            'product_name.string' => 'Tên sản phẩm phải là một chuỗi ký tự.',
            'product_name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

            'product_description.required' => 'Mô tả sản phẩm là bắt buộc.',
            'product_description.string' => 'Mô tả sản phẩm phải là một chuỗi ký tự.',

            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không tồn tại.',

            'sizes.required' => 'Kích cỡ là bắt buộc.',
            'sizes.array' => 'Kích cỡ phải là một mảng.',
            'sizes.*.exists' => 'Kích cỡ không tồn tại.',

            'colors.required' => 'Màu sắc là bắt buộc.',
            'colors.array' => 'Màu sắc phải là một mảng.',
            'colors.*.exists' => 'Màu sắc không tồn tại.',

            'variants.*.price.required' => 'Giá là bắt buộc cho từng biến thể.',
            'variants.*.price.numeric' => 'Giá phải là một số.',
            'variants.*.price.min' => 'Giá phải lớn hơn hoặc bằng 0.',

            'variants.*.stock_quantity.required' => 'Số lượng là bắt buộc cho từng biến thể.',
            'variants.*.stock_quantity.integer' => 'Số lượng phải là một số nguyên.',
            'variants.*.stock_quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',

            'images_url.*.mimes' => 'Ảnh phải có định dạng jpeg, png hoặc jpg.',
            'images_url.*.max' => 'Ảnh không được vượt quá 2MB.',
        ];
    }
}
