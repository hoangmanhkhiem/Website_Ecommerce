<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.settings', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['title' => $request->title]);
        Session::flash('message', 'Title Updated Successfully.');
        return redirect('admin/settings');
    }

    public function title(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['title' => $request->title]);

        Session::flash('message', 'Website Content Updated Successfully.');
        return redirect('admin/settings');
    }

    public function themecolor(Request $request)
    {
        $color = Settings::findOrFail(1)->theme_color;

        $actual_path = str_replace('project','',base_path());
        $style1 = $actual_path.'assets/css/genius1.css';
        $style2 = $actual_path.'assets/css/style.css';

        $file1_contents = file_get_contents($style1);
        $file2_contents = file_get_contents($style2);
        $file1_contents = str_replace($color,$request->color,$file1_contents);
        $file2_contents = str_replace($color,$request->color,$file2_contents);
        file_put_contents($style1,$file1_contents);
        file_put_contents($style2,$file2_contents);

        DB::table('settings')
            ->where('id', 1)
            ->update(['theme_color' => $request->color]);

        Session::flash('message', 'Theme Color Updated Successfully.');
        return redirect('admin/themecolor');
    }

    public function payment(Request $request)
    {

        DB::table('settings')
            ->where('id', 1)
            ->update(['paypal_business' => $request->paypal,'stripe_key' => $request->stripe_key,'stripe_secret' => $request->stripe_secret,'withdraw_fee' => $request->withdraw_fee]);

        Session::flash('message', 'Payment Informations Updated Successfully.');
        return redirect('admin/settings');
    }

    public function about(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['about' => $request->about]);


        Session::flash('message', 'About Us Text Updated Successfully.');
        return redirect('admin/settings');
    }

    public function address(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['address' => $request->address,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email]);
        Session::flash('message', 'Address Updated Successfully.');
        return redirect('admin/settings');
    }

    public function footer(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['footer' => $request->footer]);
        Session::flash('message', 'Footer Updated Successfully.');
        return redirect('admin/settings');
    }

    public function logo(Request $request)
    {
        $logo = $request->file('logo');
        $name = $logo->getClientOriginalName();
        $logo->move('assets/images/logo',$name);
        DB::table('settings')
            ->where('id', 1)
            ->update(['logo' => $name]);
        Session::flash('message', 'Website Logo Updated Successfully.');
        return redirect('admin/settings');
    }

    public function favicon(Request $request)
    {
        $logo = $request->file('favicon');
        $name = $logo->getClientOriginalName();
        $logo->move('assets/images/',$name);
        DB::table('settings')
            ->where('id', 1)
            ->update(['favicon' => $name]);
        Session::flash('message', 'Website Favicon Updated Successfully.');
        return redirect('admin/settings');
    }

    public function background(Request $request)
    {
        //return $request->all();

        ///return redirect('admin/settings');
        $logo = $request->file('background');
        $name = $logo->getClientOriginalName();
        $logo->move('assets/images',$name);
        DB::table('settings')
            ->where('id', 1)
            ->update(['background' => $name]);
        Session::flash('message', 'Background Image Updated Successfully.');
        return redirect('admin/settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
