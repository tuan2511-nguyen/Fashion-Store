<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request){
        $request->validated();
        $userId = Auth()->user()->id;
        Review::create([
            'product_id' => $request->product_id,
            'user_id' => $userId,
            'rating' => $request->rating,
            'comments' => $request->comment
        ]);
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
