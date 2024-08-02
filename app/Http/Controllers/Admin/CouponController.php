<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.pages.coupons.index', compact('coupons'));
    }
    public function create()
    {
        return view('admin.pages.coupons.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:255|unique:coupons',
            'discount_value' => 'required|numeric',
            'expiration_date' => 'nullable|date',
        ]);

        Coupon::create([
            'coupon_code' => $request->input('coupon_code'),
            'discount_value' => $request->input('discount_value'),
            'expiration_date' => $request->input('expiration_date'),
        ]);

        return redirect()->route('coupons.index')->with('success', 'Coupon added successfully.');
    }
    public function destroy($id){
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully.');
    }
}
