<?php

namespace App\Http\Controllers\Poems;

use App\Http\Controllers\Controller;
use App\Poem;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PoemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('tag')) {
            $poems = Tag::where('name', request('tag'))->firstOrFail()->poems()->paginate(20);
        } else {
            $poems = Poem::where('status', 1)->latest()->paginate(10);
        }

        return view('poems.index', [
            'poems' => $poems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poems.create', [
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
        $path = $request->file('poem_cover')->store('poems/images', 'public');

        $validatedAttributes = request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $validatedAttributes['image_path'] = $path;
        $validatedAttributes['slug'] = $slug;

        // Save the article
        $poem = auth()->user()->poems()->create($validatedAttributes);

        if (request()->has('tags')) {
            $poem->tags()->sync(request('tags'));
        }

        return redirect(route('poems'))
            ->with('success', 'Shairi limechapishwa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poem  $poem
     * @return \Illuminate\Http\Response
     */
    public function show(Poem $poem)
    {
        return view(
            'poems.show',
            [
                'poem' => $poem,
                'user_poems' => poem::where('user_id', $poem->user_id)->latest()->get()
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poem  $poem
     * @return \Illuminate\Http\Response
     */
    public function edit(Poem $poem)
    {
        $tags = Tag::all();
        return view('poems.edit', compact(['poem', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poem  $poem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poem $poem)
    {
        $this->authorize('update', $poem);

        $attributes = request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        if (request()->has('tags')) {
            $poem->tags()->sync(request('tags'));
        }

        $poem->update($attributes);

        return redirect(route('poems'))
            ->with('success', 'Shairi limechapishwa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poem  $poem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poem $poem)
    {
        $this->authorize('update', $poem);

        $poem->tags()->sync(request('tags'));

        $poem->delete();

        return redirect(route('poems'))
            ->with('success', 'Shairi limefutwa');
    }
}
