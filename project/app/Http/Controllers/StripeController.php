<?php

namespace App\Http\Controllers;

use App\Cart;
use App\OrderedProducts;
use App\Product;
use Illuminate\Http\Request;
use URL;
use Redirect;
use Input;
use Validator;
use App\Order;
use App\Package;
use App\PricingTable;
use App\Settings;
use Config;
use Session;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

class StripeController extends Controller
{

    public function __construct()
    {
        //Set Spripe Keys
        $stripe = Settings::findOrFail(1);
  		Config::set('services.stripe.key', $stripe->stripe_key);
  		Config::set('services.stripe.secret', $stripe->stripe_secret);
    }


    public function store(Request $request){

        $settings = Settings::findOrFail(1);
        $order = new Order;
        $success_url = action('PaymentController@payreturn');
        $item_name = $settings->title." Order";
        $item_number = str_random(4).time();
        $item_amount = $request->total;

		$validator = Validator::make($request->all(),[
						'card' => 'required',
						'cvv' => 'required',
						'month' => 'required',
						'year' => 'required',
					]);

		if ($validator->passes()) {

	     	$stripe = Stripe::make(Config::get('services.stripe.secret'));
	     	try{
	     		$token = $stripe->tokens()->create([
	     			'card' =>[
	     					'number' => $request->card,
	     					'exp_month' => $request->month,
	     					'exp_year' => $request->year,
	     					'cvc' => $request->cvv,
	     				],
	     			]);
	     		if (!isset($token['id'])) {
	     			return back()->with('error','Token Problem With Your Token.');
	     		}

	     		$charge = $stripe->charges()->create([
	     			'card' => $token['id'],
	     			'currency' => 'USD',
	     			'amount' => $item_amount,
	     			'description' => $item_name,
	     			]);

	     		//dd($charge);

	     		if ($charge['status'] == 'succeeded') {

                    $order['customerid'] = $request->customer;
                    $order['products'] = $request->products;
                    $order['quantities'] = $request->quantities;
                    $order['sizes'] = $request->sizes;
                    $order['pay_amount'] = $item_amount;
                    $order['method'] = "Stripe";
                    $order['customer_email'] = $request->email;
                    $order['customer_name'] = $request->name;
                    $order['customer_phone'] = $request->phone;
                    $order['booking_date'] = date('Y-m-d H:i:s');
                    $order['order_number'] = $item_number;
                    $order['customer_address'] = $request->address;
                    $order['customer_city'] = $request->city;
                    $order['customer_zip'] = $request->zip;
                    $order['payment_status'] = "Completed";
			        $order['txnid'] = $charge['balance_transaction'];
			        $order['charge_id'] = $charge['id'];
			        $order->save();
                    $orderid = $order->id;

                    $pdata = explode(',',$request->products);
                    $qdata = explode(',',$request->quantities);
                    $sdata = explode(',',$request->sizes);

                    foreach ($pdata as $data => $product){
                        $proorders = new OrderedProducts();

                        $productdet = Product::findOrFail($product);

                        $proorders['orderid'] = $orderid;
                        $proorders['owner'] = $productdet->owner;
                        $proorders['vendorid'] = $productdet->vendorid;
                        $proorders['productid'] = $product;
                        $proorders['quantity'] = $qdata[$data];
                        $proorders['size'] = $sdata[$data];
                        $proorders['cost'] = $productdet->price * $qdata[$data];
                        $proorders->save();

                        $stocks = $productdet->stock - $qdata[$data];
                        if ($stocks < 0){
                            $stocks = 0;
                        }
                        $quant['stock'] = $stocks;
                        $productdet->update($quant);
                    }
//                    foreach (array_combine($pdata, $qdata) as $product => $quantity){
//                        $productdet = Product::findOrFail($product);
//                        $stocks = $productdet->stock - $quantity;
//                        if ($stocks < 0){
//                            $stocks = 0;
//                        }
//                        $quant['stock'] = $stocks;
//                        $productdet->update($quant);
//                    }

                    Cart::where('uniqueid',Session::get('uniqueid'))->delete();

	     			return redirect($success_url);
	     		}
	     		
	     	}catch (Exception $e){
	     		return back()->with('error', $e->getMessage());
	     	}catch (\Cartalyst\Stripe\Exception\CardErrorException $e){
	     		return back()->with('error', $e->getMessage());
	     	}catch (\Cartalyst\Stripe\Exception\MissingParameterException $e){
	     		return back()->with('error', $e->getMessage());
	     	}
		}
		return back()->with('error', 'Please Enter Valid Credit Card Informations.');
	}
}
