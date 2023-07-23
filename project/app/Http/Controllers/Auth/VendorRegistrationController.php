<?php

namespace App\Http\Controllers\Auth;


use App\Category;
use App\Http\Controllers\Controller;
use App\Profile;
use App\UserProfile;
use App\Vendors;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendorRegistrationController extends Controller
{

    protected $redirectTo = '/dashboard';


    public function __construct()
    {
        $this->middleware('guest:vendor');
    }


    public function showRegistrationForm()
    {
        return view('vendor.registration');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        //return $this->registered($request, $user)
            //?: redirect(route('vendor.dashboard'));
        return redirect()->back()
            ->with('message','Registration Completed Successfully. You will notify in email when your account is active.');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('vendor');
    }

    protected function registered(Request $request, $user)
    {
        //
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'shop_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:vendor_profiles',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Vendors::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'shop_name' => $data['shop_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
