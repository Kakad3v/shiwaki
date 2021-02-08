<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Review;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('tag')) {
            $reviews = Tag::where('name', request('tag'))->firstOrFail()->reviews()->paginate(20);
        } else {
            $reviews = Review::where('status', 1)->latest()->paginate(10);
        }

        return view('reviews.index', [
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create', [
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
        $slug = Str::slug(request('title'), '-');
        $path = $request->file('review_cover')->store('reviews/images', 'public');

        $validatedAttributes = request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);


        $validatedAttributes['image_path'] = $path;
        $validatedAttributes['slug'] = $slug;


        // Save the article
        $review = auth()->user()->reviews()->create($validatedAttributes);

        if (request()->has('tags')) {
            $review->tags()->sync(request('tags'));
        }

        return redirect(route('reviews'))
            ->with('success', 'Makala yamechapishwa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view(
            'reviews.show',
            [
                'review' => $review,
                'user_reviews' => review::where('user_id', $review->user_id)->latest()->get()
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $tags = Tag::all();
        return view('reviews.edit', compact(['review', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);

        $attributes = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'artcile_cover' => 'file'
        ]);

        $attributes['slug'] = Str::slug(request('title'), '-');

        if (request()->has('article_cover')) {
            $image_path = $request->file('review_cover')->store('reviews/images', 'public');

            $attributes['image_path'] = $image_path;
        } else {
            $review->update($attributes);
        }


        if (request()->has('tags')) {
            $review->tags()->sync(request('tags'));
        }

        return redirect('/')
            ->with('success', 'Makala yamechapishwa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $this->authorize('update', $review);

        $review->tags()->detach();

        $review->delete();

        return redirect(route('reviews'))
            ->with('success', 'Makala yamefutwa');
    }
}
