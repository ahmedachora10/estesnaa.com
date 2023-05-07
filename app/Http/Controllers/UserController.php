<?php

namespace App\Http\Controllers;

use App\Models\ServiceRating;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function purchase()
    {
        $purchases = auth()->user()->purchases->load(['service.owner']);

        return view('front.my-purchase', compact('purchases'));
    }

    public function ratingServiceStore(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'rating' => 'required|numeric|min:0|max:5',
            'comment' => 'required|string|max:250'
        ], $request->all());

        ServiceRating::create([
            'user_id' => auth()->id(),
            'service_id' => $request->service_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'تم اضافة التقييم بنجاح');
    }
}