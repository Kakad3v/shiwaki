<?php

namespace App\Http\Controllers\Translations;

use App\Http\Controllers\Controller;
use App\TranslateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class TranslateRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('translations.client.index', [
            'projects' => auth()
                ->user()->accessibleRequests()
                ->latest('updated_at', 'asc')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('translations.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = Validator::make(request()->all(), [
            'title' => 'required|max:100',
            'description' => 'required',

        ]);

        if ($attributes->fails()) {

            alert('Aaaah...nah', $attributes->messages()->all(), 'error');

            return back();
        }

        $sub_url = (string) Str::uuid();

        auth()->user()->translaterequests()->create([
            'title' => request('title'),
            'description' => request('description'),
            'sub_url' => $sub_url
        ]);

        return redirect(route('translate-index'))
            ->with('success', 'Your translation request has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TranslateRequest  $translateRequest
     * @return \Illuminate\Http\Response
     */
    public function show(TranslateRequest $translateRequest)
    {
        $project = $translateRequest;

        $this->authorize('update', $project);

        return view('translations.client.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TranslateRequest  $translateRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(TranslateRequest $translateRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TranslateRequest  $translateRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TranslateRequest $translateRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TranslateRequest  $translateRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranslateRequest $translateRequest)
    {
        //
    }
}
