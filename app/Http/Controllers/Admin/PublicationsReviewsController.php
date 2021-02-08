<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class PublicationsReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.publications.reviews.index', [
            'reviews' => Review::latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review, User $user)
    {
        return view('reviews.show', [
            'review' => $review,
            'user_reviews' => $review->user->reviews()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('admin.publications.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {

        $review->title = $request->title;
        $review->body = $request->body;

        $review->status = true;

        $review->save();

        return redirect(route('admin.reviews.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return back();
    }
}
