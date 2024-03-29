<?php

namespace App\Http\Controllers\Auth;

use Inertia\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;



class EmailVerificationNotificationController extends Controller{

    public function store(Request $request): RedirectResponce {
        if($request->user()->hasVerifiedEmail()){
            return redirect()->intended(RouteServiceProvider::Home);
        }

        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');

    }

}
