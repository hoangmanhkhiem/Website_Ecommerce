<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdvertiseController extends Controller
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
        $ads = Advertisement::orderBy('id', 'DESC')->get();
        return view('admin.advertiselist',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertiseadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Advertisement;
        $data->fill($request->all());

        if ($file = $request->file('banner')){
            $banner = time().$request->file('banner')->getClientOriginalName();
            $file->move('assets/images/ads' , $banner);
            $data['banner_file'] = $banner;
        }

        $data->save();
        Session::flash('message', 'New Advertisement Added Successfully.');
        return redirect('admin/ads');
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
        $ad = Advertisement::findOrFail($id);
        return view('admin.advertiseedit',compact('ad'));
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
        $adv = Advertisement::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('banner')){
            $photo_name = time().$request->file('banner')->getClientOriginalName();
            $file->move('assets/images/ads',$photo_name);
            $input['banner_file'] = $photo_name;
        }

        $adv->update($input);
        Session::flash('message', 'Advertisement Updated Successfully.');
        return redirect('admin/ads');
    }

    public function status($id , $status)
    {
        $user = Advertisement::findOrFail($id);
        $input['status'] = $status;

        $user->update($input);
        Session::flash('message', 'Status Updated Successfully.');
        return redirect('admin/ads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Advertisement::findOrFail($id);
        $ads->delete();
        Session::flash('message', 'Advertisement Deleted Successfully.');
        return redirect('admin/ads');
    }

}
