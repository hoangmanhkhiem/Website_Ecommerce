<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderedProducts;
use App\Product;
use App\Vendors;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        //Order::$withoutAppends = true;
        $orders = Order::where('payment_status',"Completed")->orderBy('id','desc')->get();
        return view('admin.orderlist',compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $products = OrderedProducts::where('orderid',$id)->get();
        return view('admin.orderdetails',compact('order','products'));
    }

    public function status($id,$status)
    {
        $mainorder = Order::findOrFail($id);
        if ($mainorder->status == "completed"){
            return redirect('admin/orders')->with('message','This Order is Already Completed');
        }else{
        $stat['status'] = $status;

        if ($status == "completed"){
            $orders = OrderedProducts::where('orderid',$id)->get();

            foreach ($orders as $payee) {
                $order = OrderedProducts::findOrFail($payee->id);

                if ($order->owner == "vendor"){
                    $vendor = Vendors::findOrFail($payee->vendorid);
                    $balance['current_balance'] = $vendor->current_balance + $payee->cost;
                    $vendor->update($balance);
                }
                $sts['paid'] = "yes";
                $sts['status'] = "completed";
                $order->update($sts);
            }
        }

        $mainorder->update($stat);
        return redirect('admin/orders')->with('message','Order Status Updated Successfully');
        }
    }

    public function email($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.sendmail', compact('order'));
    }

    public function sendemail(Request $request)
    {
        mail($request->to,$request->subject,$request->message);
        return redirect('admin/orders')->with('message','Email Send Successfully');
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
