<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Gallery;
use App\Order;
use App\OrderedProducts;
use App\PageSettings;
use App\Product;
use App\Review;
use App\SectionTitles;
use App\Service;
use App\ServiceSection;
use App\Settings;
use App\Subscribers;
use App\Testimonial;
use App\UserProfile;
use App\Vendors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class FrontEndController extends Controller
{

    public function __construct()
    {
        //$this->middleware('web');
        //$this->middleware('auth:profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = SectionTitles::findOrFail(1);
        $services = ServiceSection::all();
        $features = Product::where('featured','1')->where('status','1')->orderBy('id','desc')->take(8)->get();
        $tops = Product::where('status','1')->orderBy('views','desc')->take(8)->get();
        $latests = Product::where('status','1')->orderBy('id','desc')->take(8)->get();
        $testimonials = Testimonial::all();
        return view('index', compact('services','categories','features','latests','tops','testimonials','portfilos','languages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendorproduct($id)
    {
        $vendor = Vendors::findOrFail($id);
        $products = Product::where('vendorid',$id)->where('status','1')->take(12)->get();
        return view('vendorproduct', compact('products','vendor'));
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
        //
    }

    public function cartupdate(Request $request)
    {

        if ($request->isMethod('post')){

            if (empty(Session::get('uniqueid'))){

                $cart = new Cart;
                $cart->fill($request->all());
                Session::put('uniqueid', $request->uniqueid);
                $cart->save();

            }else{

                $cart = Cart::where('uniqueid',$request->uniqueid)
                    ->where('product',$request->product)->first();
                //$carts = Cart::where('uniqueid',$request->uniqueid)
                        //->where('product',$request->product)->count();
                if (count($cart) > 0 ){
                    $data =  $request->all();
                    $cart->update($data);
                }else{
                    $cart = new Cart;
                    $cart->fill($request->all());
                    $cart->save();
                }

            }
            return response()->json(['response' => 'Successfully Added to Cart.','product' => $request->product]);
        }

        $getcart = Cart::where('uniqueid',Session::get('uniqueid'))->get();

        return response()->json(['response' => $getcart]);
    }

    public function cartdelete($id)
    {
        $cartproduct = Cart::where('uniqueid',Session::get('uniqueid'))
            ->where('product',$id)->first();
        $cartproduct->delete();

        $getcart = Cart::where('uniqueid',Session::get('uniqueid'))->get();
        return response()->json(['response' => $getcart]);
    }

    //Submit Review
    public function reviewsubmit(Request $request)
    {
        $review = new Review;
        $review->fill($request->all());
        $review['review_date'] = date('Y-m-d H:i:s');
        $review->save();
        return redirect()->back()->with('message','Your Review Submitted Successfully.');
    }

    //Product Data
    public function productdetails($id,$title)
    {
        $productdata = Product::findOrFail($id);
        $data['views'] = $productdata->views + 1;
        $productdata->update($data);
        $relateds = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$productdata->category[0]])
            ->take(8)->get();
        $gallery = Gallery::where('productid',$id)->get();

        $reviews = Review::where('productid',$id)->get();
        return view('product', compact('productdata','gallery','reviews','relateds'));
    }

    //Category Products
    public function catproduct($slug)
    {
        $sort = "";
        if (Input::get('sort') != "") {
            $sort = Input::get('sort');
        }

        $category = Category::where('slug',$slug)->first();
        if ($category === null) {
            $category['name'] = "Nothing Found";
            $products = new \stdClass();
        }else{

            if ($sort=="old") {
                
                $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->orderBy('created_at','asc')
                ->take(9)
                ->get();
                
            }elseif ($sort=="new") {

                $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->orderBy('created_at','desc')
                ->take(9)
                ->get();

            }elseif ($sort=="low") {

                $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->orderBy('price','asc')
                ->take(9)
                ->get();

            }elseif ($sort=="high") {

                $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->orderBy('price','desc')
                ->take(9)
                ->get();

            }else{

                $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->orderBy('created_at','desc')
                ->take(9)
                ->get();
            }
        }
        return view('categoryproduct', compact('products','category','sort'));
    }

    //Load More Category Products
    public function loadcatproduct($slug,$page)
    {
        $res = "";
        $skip = ($page-1)*9;

        $sort = "";
        if (Input::get('sort') != "") {
            $sort = Input::get('sort');
        }

        $category = Category::where('slug',$slug)->first();
        if ($category === null) {
            $category['name'] = "Nothing Found";
            $products = new \stdClass();
        }else{

            if ($sort=="old") {
                
                $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->orderBy('created_at','asc')
                ->skip($skip)
                ->take(9)
                ->get();
                
            }elseif ($sort=="new") {

                $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->orderBy('created_at','desc')
                ->skip($skip)
                ->take(9)
                ->get();

            }elseif ($sort=="low") {

                $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->orderBy('price','asc')
                ->skip($skip)
                ->take(9)
                ->get();

            }elseif ($sort=="high") {

                $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->orderBy('price','desc')
                ->skip($skip)
                ->take(9)
                ->get();

            }else{

                $products = Product::where('status','1')->whereRaw('FIND_IN_SET(?,category)', [$category->id])
                ->orderBy('created_at','desc')
                ->skip($skip)
                ->take(9)
                ->get();
            }


            foreach($products as $product) {
                $res .= '<div class="col-xs-6 col-sm-4 product">
                        <article class="col-item">
                            <div class="photo">
                                <a href="' . url('/product') . '/' . $product->id . '/' . str_replace(' ', '-', strtolower($product->title)) . '"> <img src="' . url('/assets/images/products') . '/' . $product->feature_image . '" class="img-responsive" style="height: 320px;" alt="Product Image"> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details">
                                        <a href="' . url('/product') . '/' . $product->id . '/' . str_replace(' ', '-', strtolower($product->title)) . '" class="row" style="min-height: 60px">
                                            <h1>' . $product->title . '</h1>
                                        </a>
                                        <div class="pull-left">';
                if ($product->previous_price != "") {
                    $res .= '<span class="price-old">$' . $product->previous_price . '</span>';
                }
                $res .= '
                         <span class="price-new">$' . $product->price . '</span>
                        </div>
                            <div class="pull-right">
                                <span class="review">';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= Review::where('productid', $product->id)->avg('rating')) {
                        $res .= '     <i class="fa fa-star"></i>';
                    } else {
                        $res .= '     <i class="fa fa-star-o"></i>';
                    }
                }

                $res .= '
                                </span>
                            </div>

                                    </div>
                                </div>
                                <div class="separator clear-left">
                                    <form>
                                        <p>';
                if (Session::has('uniqueid')) {
                    $res .= '<input type="hidden" name="uniqueid" value="' . Session::get('uniqueid') . '">';
                } else {
                    $res .= '<input type="hidden" name="uniqueid" value="' . str_random(7) . '">';
                }

                $res .= '
                                        <input name="title" value="' . $product->title . '" type="hidden">
                                        <input name="product" value="' . $product->id . '" type="hidden">
                                        <input id="cost" name="cost" value="' . $product->price . '" type="hidden">
                                        <input id="quantity" name="quantity" value="1" type="hidden">';
                if ($product->stock != 0){
                    $res .='<button onclick="toCart(this)" type = "button" class="button style-10" > Add to cart </button >';
                }else{
                    $res .='<button type = "button" class="button style-10" disabled > Out Of Stock </button >';
                }
                $res .='                                     
                                        </p>
                                    </form>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>';
            }

        }
        return $res;
    }
    //Load More Vendor Products
    public function loadvendproduct($id,$page)
    {
        $res = "";
        $skip = ($page-1)*12;


        $products = Product::where('vendorid',$id)->where('status','1')
        ->orderBy('created_at','asc')
        ->skip($skip)
        ->take(12)
        ->get();

            foreach($products as $product) {
                $res .= '<div class="col-xs-6 col-sm-3 product">
                        <article class="col-item">
                            <div class="photo">
                                <a href="' . url('/product') . '/' . $product->id . '/' . str_replace(' ', '-', strtolower($product->title)) . '"> <img src="' . url('/assets/images/products') . '/' . $product->feature_image . '" class="img-responsive" style="height: 320px;" alt="Product Image"> </a>
                            </div>
                            <div class="info">
                                <div class="row">
                                    <div class="price-details">
                                        <a href="' . url('/product') . '/' . $product->id . '/' . str_replace(' ', '-', strtolower($product->title)) . '" class="row" style="min-height: 60px">
                                            <h1>' . $product->title . '</h1>
                                        </a>
                                        <div class="pull-left">';
                if ($product->previous_price != "") {
                    $res .= '<span class="price-old">$' . $product->previous_price . '</span>';
                }
                $res .= '
                         <span class="price-new">$' . $product->price . '</span>
                        </div>
                            <div class="pull-right">
                                <span class="review">';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= Review::where('productid', $product->id)->avg('rating')) {
                        $res .= '     <i class="fa fa-star"></i>';
                    } else {
                        $res .= '     <i class="fa fa-star-o"></i>';
                    }
                }

                $res .= '
                                </span>
                            </div>

                                    </div>
                                </div>
                                <div class="separator clear-left">
                                    <form>
                                        <p>';
                if (Session::has('uniqueid')) {
                    $res .= '<input type="hidden" name="uniqueid" value="' . Session::get('uniqueid') . '">';
                } else {
                    $res .= '<input type="hidden" name="uniqueid" value="' . str_random(7) . '">';
                }

                $res .= '
                                        <input name="title" value="' . $product->title . '" type="hidden">
                                        <input name="product" value="' . $product->id . '" type="hidden">
                                        <input id="cost" name="cost" value="' . $product->price . '" type="hidden">
                                        <input id="quantity" name="quantity" value="1" type="hidden">';
                if ($product->stock != 0){
                    $res .='<button onclick="toCart(this)" type = "button" class="button style-10" > Add to cart </button >';
                }else{
                    $res .='<button type = "button" class="button style-10" disabled > Out Of Stock </button >';
                }
                $res .='                                     
                                        </p>
                                    </form>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>';
            }
        return $res;
    }

    //Search Products
    public function searchproduct($search)
    {
       $products = Product::where('status','1')->where('title', 'like', '%' . $search . '%')
                ->get();
       return view('searchproduct', compact('products','search'));
    }


    public function cashondelivery(Request $request)
    {
        $settings = Settings::findOrFail(1);
        $order = new Order;
        $success_url = action('PaymentController@payreturn');
        $item_name = $settings->title." Order";
        $item_number = str_random(4).time();
        $item_amount = $request->total;

        $order['customerid'] = $request->customer;
        $order['products'] = $request->products;
        $order['quantities'] = $request->quantities;
        $order['sizes'] = $request->sizes;
        $order['pay_amount'] = $item_amount;
        $order['method'] = "Cash On Delivery";
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;
        $order['customer_phone'] = $request->phone;
        $order['booking_date'] = date('Y-m-d H:i:s');
        $order['order_number'] = $item_number;
        $order['customer_address'] = $request->address;
        $order['customer_city'] = $request->city;
        $order['customer_zip'] = $request->zip;
        $order['payment_status'] = "Completed";
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

        Cart::where('uniqueid',Session::get('uniqueid'))->delete();

        return redirect($success_url);
    }

    //Profile Data
    public function account()
    {
        //$profiledata = UserProfile::findOrFail($id);
        return view('account');
    }

    //Contact Page Data
    public function contact()
    {
        $pagedata = PageSettings::find(1);
        return view('contact', compact('pagedata'));
    }

    //About Page Data
    public function about()
    {
        $pagedata = PageSettings::find(1);
        return view('about', compact('pagedata'));
    }

    //FAQ Page Data
    public function faq()
    {
        $pagedata = PageSettings::find(1);
        return view('faq', compact('pagedata'));
    }

    //Show Category Users
    public function category($category)
    {
        $categories = Category::where('slug', $category)->first();
        $services = Service::where('status', 1)
            ->where('category', $categories->id)
            ->get();
        $pagename = "All Sevices in: ".ucwords($categories->name);
        return view('services', compact('services','pagename','categories'));
    }


    //Show Cart
    public function cart()
    {
        $sum = 0.00;
        $carts = new \stdClass();
        if (Session::has('uniqueid')){
            $carts = Cart::where('uniqueid', Session::get('uniqueid'))->get();
            $sum = Cart::where('uniqueid', Session::get('uniqueid'))->sum('cost');
        }
        return view('cart', compact('carts','sum'));
    }

    //User Subscription
    public function subscribe(Request $request)
    {
        $subscribe = new Subscribers;
        $subscribe->fill($request->all());
        $subscribe->save();
        Session::flash('subscribe', 'You are subscribed Successfully.');
        return redirect('/');
    }

    //Send email to Admin
    public function contactmail(Request $request)
    {
        $pagedata = PageSettings::findOrFail(1);
        $settings = Settings::findOrFail(1);
        $subject = "Contact From Of ".$settings->title;
        $to = $request->to;
        $name = $request->name;
        $phone = $request->phone;
        $department = $request->department;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nPhone: ".$request->phone."\nGender ".$request->department."\nMessage: ".$request->message;

        mail($to,$subject,$msg);

        Session::flash('cmail', $pagedata->contact);
        return redirect('/contact');
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
