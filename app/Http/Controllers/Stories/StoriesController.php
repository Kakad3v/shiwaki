<?php

namespace App\Http\Controllers\Stories;

use App\Http\Controllers\Controller;
use App\Story;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('tag')) {
            $stories = Tag::where('name', request('tag'))->firstOrFail()->stories()->paginate(20);
        } else {
            $stories = Story::where('status', 1)->latest()->paginate(2);
        }

        return view('stories.index', [
            'stories' => $stories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stories.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'title' => 'required|min:5',
            'body' => 'required',
        ]);


        $slug = Str::slug(request('title'), '-');

        if ($validator->fails()) {

            alert('Aaaah...nah', $validator->messages()->all(), 'error');

            return back();
        }

        $story = auth()->user()->stories()->create([
            'title' => request('title'),
            'body' => request('body'),
            'slug' => $slug
        ]);

        if (request()->has('tags')) {
            $story->tags()->sync(request('tags'));
        }

        return redirect(route('stories'))
            ->with('success', 'Hadithi imechapishwa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        return view(
            'stories.show',
            [
                'story' => $story,
                'user_stories' => Story::where('user_id', $story->user_id)->latest()->get()
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {

        $tags = Tag::all();
        return view('stories.edit', compact(['story', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $this->authorize('update', $story);

        $attributes = request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $story->update($attributes);

        if (request()->has('tags')) {
            $story->tags()->sync(request('tags'));
        }

        return redirect(route('stories'))
            ->with('success', 'Hadithi imechapishwa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $this->authorize('update', $story);

        $story->tags()->detach();

        $story->delete();

        return redirect(route('stories'))
            ->with('success', 'Story deleted successfully');
    }
}
