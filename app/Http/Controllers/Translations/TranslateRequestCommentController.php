<?php

namespace App\Http\Controllers\Translations;

use App\Http\Controllers\Controller;
use App\TranslateRequest;
use App\TranslateRequestComment;
use Illuminate\Http\Request;

class TranslateRequestCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TranslateRequest $translateRequest)
    {
        $translate_request_id = $translateRequest->id;
        $validatedComment = request()->validate([
            'body' => 'required',
        ]);

        $validatedComment['translate_request_id'] = $translate_request_id;

        auth()->user()->requestcomments()->create($validatedComment);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TranslateRequestComment  $translateRequestComment
     * @return \Illuminate\Http\Response
     */
    public function show(TranslateRequestComment $translateRequestComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TranslateRequestComment  $translateRequestComment
     * @return \Illuminate\Http\Response
     */
    public function edit(TranslateRequestComment $translateRequestComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TranslateRequestComment  $translateRequestComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TranslateRequestComment $translateRequestComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TranslateRequestComment  $translateRequestComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranslateRequestComment $translateRequestComment)
    {
        //
    }
}
