<?php

namespace App\Http\Controllers\Translations;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectInvitationRequest;
use App\TranslateRequest;
use App\User;
use Illuminate\Http\Request;

class TranslateRequestInvitationsController extends Controller
{

    public function store(TranslateRequest $translateRequest, ProjectInvitationRequest $request)
    {

        $user = User::whereEmail(request('email'))->first();

        $translateRequest->invite($user);

        return back()->with('success', 'The invite was successfully sent');
    }
}
