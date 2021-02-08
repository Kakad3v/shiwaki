<?php

namespace App\Http\Controllers\TranslatedWorks;

use App\Http\Controllers\Controller;
use App\TranslatedWork;
use Illuminate\Http\Request;

class TranslatedWorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('translatedworks.index', [
            'works' => TranslatedWork::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('translatedworks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'foreign_title' => 'required',
            'swahili_title' => 'required',
            'foreign_body' => 'required',
            'swahili_body' => 'required',
            'author' => 'required',
            'translated_by' => 'required',
            'original_url' => 'required',
            'original_site_name' => 'required',
        ]);

        auth()->user()->translatedworks()->create($attributes);

        return redirect(route('tx-works-index'))
            ->with('success', 'The translation was published');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TranslatedWork  $translatedWork
     * @return \Illuminate\Http\Response
     */
    public function show(TranslatedWork $translatedWork)
    {
        return view('translatedworks.show', compact('translatedWork'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TranslatedWork  $translatedWork
     * @return \Illuminate\Http\Response
     */
    public function edit(TranslatedWork $translatedWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TranslatedWork  $translatedWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TranslatedWork $translatedWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TranslatedWork  $translatedWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranslatedWork $translatedWork)
    {
        //
    }
}
