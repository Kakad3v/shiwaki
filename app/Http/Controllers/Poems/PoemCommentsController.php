<?php

namespace App\Http\Controllers\Poems;

use App\Http\Controllers\Controller;
use App\Poem;
use App\PoemComment;
use Illuminate\Http\Request;

class PoemCommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Poem $poem)
    {
        $validatedComment = request()->validate([
            'body' => 'required',
        ]);

        $validatedComment['poem_id'] = $poem->id;

        auth()->user()
            ->poemcomments()
            ->create($validatedComment);

        return back();
    }
}
