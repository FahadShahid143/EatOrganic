<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Illuminate\Support\Facades\Input;

class ReviewController extends Controller
{
    public function index(Request $request)
    {

        $review = new Review();
        $review->name = Input::get('name');
        $review->ProductID = Input::get('PID');
        $review->email = Input::get('email');
        $review->comment = Input::get('comment');

        $review->save();
        return redirect()->back()->with('success_message', 'Review Added!');
     //   return Review::all();
    }

    public function show(Review $review)
    {
        return $review;
    }

    public function store(Request $request)
    {
        $review = Review::create($request->all());

        return response()->json($review, 201);
    }

    public function update(Request $request, Review $review)
    {
        $review->update($request->all());

        return response()->json($review, 200);
    }

    public function delete(Review $review)
    {
        $review->delete();

        return response()->json(null, 204);
    }
}
