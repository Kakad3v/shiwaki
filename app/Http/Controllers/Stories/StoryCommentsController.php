<?php

namespace App\Http\Controllers\Stories;

use App\Http\Controllers\Controller;
use App\Story;
use App\StoryComment;
use Illuminate\Http\Request;

class StoryCommentsController extends Controller
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
    public function store(Request $request, Story $story)
    {
        $validatedComment = request()->validate([
            'body' => 'required',
        ]);

        $validatedComment['story_id'] = $story->id;

        auth()->user()
            ->storycomments()
            ->create($validatedComment);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StoryComment  $storyComment
     * @return \Illuminate\Http\Response
     */
    public function show(StoryComment $storyComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StoryComment  $storyComment
     * @return \Illuminate\Http\Response
     */
    public function edit(StoryComment $storyComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StoryComment  $storyComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoryComment $storyComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StoryComment  $storyComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoryComment $storyComment)
    {
        //
    }
}
