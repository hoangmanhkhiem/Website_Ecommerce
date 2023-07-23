<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:profile');
    }

    public function showLoginFrom(){
        return view('userlogin');
    }

    public function login(Request $request){

        if (Auth::guard('profile')->attempt(['email' => $request->email,'password' => $request->password], false)){
            return redirect()->intended(route('user.account'));
        }

        //return redirect()->back()->withInput($request->only('email'));
        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username()))
            ->withErrors($errors);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }




}
