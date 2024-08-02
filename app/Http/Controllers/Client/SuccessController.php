<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuccessController extends Controller
{
    public function index()
    {
        $order = Order::with(['details.variant.product']) // Load mối quan hệ cần thiết
            ->where('user_id', Auth::user()->id)
            ->latest()
            ->first();

        return view('client.pages.success', compact('order'));
    }
}
