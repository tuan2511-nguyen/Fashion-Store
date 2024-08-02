<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Xác định người dùng có quyền gửi yêu cầu này không.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Chỉnh sửa nếu cần kiểm tra quyền người dùng
    }

    /**
     * Xác thực các dữ liệu đầu vào.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'billing_name' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'payment_method' => 'required',
            'order_notes' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Tùy chỉnh thông báo lỗi xác thực.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'billing_name.required' => 'Tên là bắt buộc.',
            'province.required' => 'Tỉnh thành là bắt buộc.',
            'district.required' => 'Quận huyện là bắt buộc.',
            'ward.required' => 'Phường xã là bắt buộc.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'payment_method.required' => 'Phương thức thanh toán là bắt buộc.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
        ];
    }
}
