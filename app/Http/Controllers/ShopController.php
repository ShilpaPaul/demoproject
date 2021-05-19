<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopkeeperModel;
use App\Models\Dealeritem;
use App\Models\ItemModel;
use App\Models\DealerModel;
use App\Models\Customer;
use App\Models\Sales;

class ShopController extends Controller
{
    public function create()
    {
        return view('shopkeeperlogin');
    }

    public function show()
    {
        return view('addadmin');
    }

    public function store(Request $request)
    {
        $s=new ShopkeeperModel();
        $s->s_mail=$request->input('email');
        $s->s_pass=$request->input('password');
        $s->save();
    }

    public function check(Request $request)
    {
        //return $request->input();
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $userInfo = ShopkeeperModel::where('s_mail','=', $request->email)->first();

        if(!$userInfo){
            //echo("no user");
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if($request->password==$userInfo->s_pass){
                //echo("sucess");
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/shopdashboard');
            }
            else{
                return back()->with('fail','Incorrect password');
            }
        }

    }

    public function dashboard() 
    {
        $cust=Customer::all();
        $c_count=count($cust);

        $sale=Sales::all();
        $s_count=count($sale);

        $item=Dealeritem::where('di_status','=', 'sold')->get();
        $i_count=count($item);
        
        $deal=DealerModel::all();
        $d_count=count($deal);

        return view('dashindex')->with('c_count',$c_count)->with('s_count',$s_count)->with('i_count',$i_count)->with('d_count',$d_count);
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }
    
    public function dealer(){
        $dis=Dealeritem::where('di_status','=', 'pending')->get();
        return view('shopdealer')->with('dis',$dis);
    }

    public function detail($id,$d_id)
    {
        $data = ['di'=>Dealeritem::where('id','=', $id)->first()];
        $data2= ['dealer'=>DealerModel::where('id','=', $d_id )->first()];
        return view('shoppurchase',$data,$data2);
    }

    
}
