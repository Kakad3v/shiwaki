<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Review;
use App\ReviewComment;
use App\User;
use Illuminate\Http\Request;


class ReviewCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Review $review)
    {
        $attributes = request()->validate([

            'body' =>
            [
                'required',
                'max:140',

            ]
        ]);

        $attributes['review_id'] = $review->id;
        $attributes['user_id'] = auth()->id();

        // dd($attributes);
        $comment = auth()->user()
            ->reviewcomments()->create($attributes);


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReviewComment  $reviewComment
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewComment $reviewComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReviewComment  $reviewComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ReviewComment $reviewComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReviewComment  $reviewComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReviewComment $reviewComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReviewComment  $reviewComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReviewComment $reviewComment)
    {
        //
    }
}
