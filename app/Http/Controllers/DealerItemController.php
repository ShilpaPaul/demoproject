<?php

namespace App\Http\Controllers;
use App\Models\Dealeritem;
use App\Models\DealerModel;
use App\Models\Sales;
use App\Models\Customer;
use Illuminate\Http\Request;

class DealerItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $dis=Dealeritem::where('di_status','=', 'sold')->take(6)->get();
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
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name'=>'required',
            'item_description'=>'required',
            'item_price'=>'required',
            'item_image'=>'required'
        ]);

        $dealerdata=['LoggedUserInfo'=>DealerModel::where('id','=',session('LoggedDealer'))->first()];
        $id=session('LoggedDealer', 'id');
       
        $item=new Dealeritem();
        $item->di_name=$request->input('item_name');
        $item->di_desc=$request->input('item_description');
        $item->di_price=$request->input('item_price');
        $item->di_status="pending";
        $item->view_price=0;
        $item->d_id=$id;

        if($request->hasfile('item_image')){
            $file=$request->file('item_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/item/',$filename);
            $item->di_image=$filename;
        }
    
        else
        {
            return $request;
            $item->di_image='';
        }
        
            $save=$item->save();
            if($save){
                return back()->with('t','Item added sucessfully'); 
            }
            else
            {
                return back()->with('f','Somthing went wrong, Please try again later');
            }
    }

    public function storeshop(Request $request)
    {
        $request->validate([
            'item_name'=>'required',
            'item_description'=>'required',
            'item_cost'=>'required',
            'item_price'=>'required',
            'item_image'=>'required'
        ]);

        $item=new Dealeritem();
        $item->di_name=$request->input('item_name');
        $item->di_desc=$request->input('item_description');
        $item->di_price=$request->input('item_cost');
        $item->di_status="sold";
        $item->view_price=$request->input('item_price');
        $item->d_id=1;

        if($request->hasfile('item_image')){
            $file=$request->file('item_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/item/',$filename);
            $item->di_image=$filename;
        }
    
        else
        {
            return $request;
            $item->di_image='';
        }
        
            $save=$item->save();
            if($save){
                return back()->with('t','Item added sucessfully'); 
            }
            else
            {
                return back()->with('f','Somthing went wrong, Please try again later');
            }
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
