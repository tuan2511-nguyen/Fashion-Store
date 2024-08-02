<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerReviewController extends Controller
{
    public function index()
    {
        // Eager load comments with users
        $comments = Review::with('product')->get();
        
        return view('admin.pages.reviews.index', compact('comments'));
    }
    public function destroy($id){
        $review = Review::find($id);
        $review->delete();
        return redirect()->back();
    }
}
