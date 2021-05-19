<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Dealeritem;
use App\Models\Sales;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $custdata = ['LoggedUserInfo'=>Customer::where('id','=', session('LoggedCustomer'))->first()];
       
        return view('customerpassword',$custdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer');
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
            'c_mail'=>'required|email|unique:customers',
            'password'=>'required|min:5|max:12',
            'name'=>'required',
            'phone_no'=>'required|min:7|max:15',
            'confirm_password'=>'required|min:5|max:12',
        ]);
        
            if($request->password!=$request->confirm_password){
                return back()->with('fail1','Password not same');
            }

        $c_name=request('name');
        $c_phone=request('phone_no');
        $c_mail=request('c_mail');
        $c_pass=Hash::make(request('password'));
        
            $c=new Customer();
            $c->c_name=$c_name;
            $c->c_phone=$c_phone;
            $c->c_mail=$c_mail;
            $c->c_pass=$c_pass;
            $save=$c->save();
            
            if($save){
                session()->put('LoggedCustomer',$c->id);
                return redirect('customerdashboard');
            }else{
                return back()->with('fail','Somthing went wrong, Please try again later');
            }
    }

    public function login(Request $request)
    {
        $request->validate([
            'Email'=>'required|email',
            'Password'=>'required|min:5|max:12'
        ]);

        $userInfo = Customer::where('c_mail','=', $request->Email)->first();
            //check email    
        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->Password,$userInfo->c_pass)){
                $request->session()->put('LoggedCustomer', $userInfo->id);
                return redirect('customerdashboard');
            }
            else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedCustomer')){
            session()->pull('LoggedCustomer');
            return redirect('customer');
        }
    }

    function dashboard(){
        $custdata = Customer::where('id','=', session('LoggedCustomer'))->first();
        
        $data = Sales::join("customers","customers.id","=","sales.c_id")
        ->join("dealeritems","dealeritems.id","=","sales.item_id")
        ->where("sales.c_id", '=', $custdata->id)->select("dealeritems.di_image","sales.id","dealeritems.di_name","dealeritems.di_desc","dealeritems.view_price","sales.created_at","sales.address","dealeritems.di_status")->get();
        $cname=$custdata->c_name;
        
            return view('customerdashdata')->with('data',$data)->with('cname',$cname);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $cust = Customer::all();
        
        return view('shopcustomertable')->with('cust',$cust);
        
        
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
    public function update(Request $request, $id) //change password
    {
        $request->validate([
            'old_password'=>'required|min:5|max:12',
            'new_password'=>'required|min:5|max:12',
            'confirm_password'=>'required|min:5|max:12'
        ]);

        if($request->new_password!=$request->confirm_password){
            return back()->with('fail','Passwords are not same');
        }
        
        $userInfo = Customer::find($id);
   
        if(Hash::check($request->old_password,$userInfo->c_pass)){
                $userInfo->c_pass=Hash::make(request('new_password'));
                $save=$userInfo->save();
                if($save)
                {
                    return back()->with('success',"Password changed successfully");
                }
                else
                {
                    return back()->with('fail',"Password doesn't changed");
                }
        }else{
                
                return back()->with('fail',"Old password doesn't match");
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
        //
    }
}
