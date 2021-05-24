<?php

namespace App\Http\Controllers;
use App\Models\Dealeritem;
use App\Models\DealerModel;
use App\Models\Sales;
use App\Models\Customer;
use Illuminate\Http\Request;
//use env;

use Illuminate\Support\Facades\Response;
 //use App\Images;
 use Image;

class DealerItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $dis=Dealeritem::where('di_status','=', 'sold')->latest()->take(6)->get();
        return view('index')->with('dis',$dis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dealerdata = ['LoggedUserInfo'=>DealerModel::where('id','=', session('LoggedDealer'))->first()];
        return view ('dealeradditem',$dealerdata);
    }

    public function createshop()
    {
        return view ('shopadditem');
    }

    public function createproducts()
    {
        $dis=Dealeritem::join("dealer_models","dealer_models.id","=","dealeritems.d_id")
        ->where('dealeritems.di_status','=', 'sold')
        ->select('dealeritems.id','dealeritems.di_name','dealeritems.di_desc','dealeritems.di_price','dealeritems.view_price','dealer_models.d_name','dealeritems.di_image','dealeritems.d_id')
        ->get();
        return view('shopproducts')->with('dis',$dis);
    }

    public function display(){
        $dis=Dealeritem::where('di_status','=', 'sold')->get();
        return view('products')->with('dis',$dis);
    }

    public function productsearch(Request $request)
    {
        $request->validate([
            'hint'=>'required'
        ]);
        $hint=$request->input('hint'); 
        $dis=Dealeritem::where('di_name','LIKE',"%{$hint}%")
        ->where('di_status','=', 'sold')
        ->get();
        return view('products')->with('dis',$dis);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //incomplete
    public function store(Request $request)
    {
        $request->validate([
            'item_name'=>'required',
            'item_description'=>'required',
            'item_price'=>'required',
            'item_image'=>'required|image|max:2048'
        ]);

        $dealerdata=['LoggedUserInfo'=>DealerModel::where('id','=',session('LoggedDealer'))->first()];
        $dealerid=session('LoggedDealer', 'id');

        $image_file = $request->item_image;

        $image = Image::make($image_file);

        Response::make($image->encode('jpeg'));

        // $item=new Dealeritem();
        // $item->di_name=$request->input('item_name');
        // $item->di_desc=$request->input('item_description');
        // $item->di_price=$request->input('item_price');
        // $item->di_status="pending";
        // $item->view_price=0;
        // $item->d_id=$dealerid;
        // $item->di_image=$image;

        $pending="pending";
        $zero=0;

        $form_data = array(
            'user_name'  => $request->user_name,
            'di_name'=>$request->item_name,
            'di_desc'=>$request->item_description,
            'di_price'=>$request->item_price,
            'di_status'=>$pending,
            'view_price'=>$zero,
            'd_id'=>$dealerid,
            'di_image' => $image
           );
      
           Dealeritem::create($form_data);

           return back()->with('t','Item added sucessfully'); 

            // if($save){
            //     return back()->with('t','Item added sucessfully'); 
            // }
            // else
            // {
            //     return back()->with('f','Somthing went wrong, Please try again later');
            // }
    }

    public function storeshop(Request $request)
    {
        $request->validate([
            'item_name'=>'required',
            'item_description'=>'required',
            'item_cost'=>'required',
            'item_price'=>'required',
            'item_image'=>'required|image|max:2048'
        ]);

        $image_file = $request->item_image;

        $image = Image::make($image_file);

        Response::make($image->encode('jpeg'));

        $item=new Dealeritem();
        $item->di_name=$request->input('item_name');
        $item->di_desc=$request->input('item_description');
        $item->di_price=$request->input('item_cost');
        $item->di_status="sold";
        $item->view_price=$request->input('item_price');
        $item->d_id=1;
        $item->di_image=$image;

            $save=$item->save();

            if($save){
                return back()->with('t','Item added sucessfully'); 
            }
            else
            {
                return back()->with('f','Somthing went wrong, Please try again later');
            }
    }

    function fetch_image($image_id)
    {
     $image = Dealeritem::findOrFail($image_id);

     $image_file = Image::make($image->di_image);

     echo($image->di_image);

     $response = Response::make($image_file->encode('jpeg'));

     $response->header('Content-Type', 'image/jpeg');

     //return($image->di_image);
     return $response;
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
        $item=Dealeritem::find($id);
        return view('shopbuyitem',compact('item'));
    }

    public function createdetail($id)
    {
        $item=Dealeritem::find($id);
        return view('product-details',compact('item'));
    }

    public function createbill($id)
    {
        $cid=session('LoggedCustomer', 'id');
        $cust=Customer::find($cid);
        $di=Dealeritem::find($id);
        $cname=$cust->c_name;

        return view('customerbill',compact('di'))->with('cname',$cname);
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
        $item=Dealeritem::find($id);

        $item->di_name=request('item_name');
        $item->di_desc=request('item_description');
        $item->view_price=request('item_price');
        $item->di_status="sold";

        $save=$item->save();
        if($save){
            return redirect('shopdealer')->with('t','Product added sucessfully'); 
        }
        else
        {
            return redirect('shopdealer')->with('f','Somthing went wrong, Please try again later');
        }
    }

   
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Dealeritem::where('di_status','=', 'rejected')->where('d_id','=', $id);
        if($item){
            $item->delete();
            }
        return redirect('/dealerdashboard');
    }

    public function reject($id)
    {
        $item=Dealeritem::find($id);
        $item->di_status="rejected";
        $item->save();
        return redirect('/shopdealer');
    }
}
