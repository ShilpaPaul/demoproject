<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dealeritem;
use App\Models\DealerModel;
use App\Models\Sales;
use Illuminate\Support\Facades\Hash;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dealerview');
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
            'd_mail'=>'required|email|unique:dealer_models',
            'password'=>'required|min:5|max:12',
            'name'=>'required',
            'phone_no'=>'required|min:7|max:15',
            'confirm_password'=>'required|min:5|max:12',
        ]);
        
            if($request->password!=$request->confirm_password){
                return back()->with('fail1','Password not same');
            }

        
            $c=new DealerModel();
            $c->d_name=$request->name;
            $c->d_phone=$request->phone_no;
            $c->d_mail=$request->d_mail;
            $c->d_pass=Hash::make($request->password);
            $save=$c->save();

            if($save){
                session()->put('LoggedDealer',$c->id);
                return redirect('dealerdashboard');
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

        $userInfo = DealerModel::where('d_mail','=', $request->Email)->first();
            //check email    
        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->Password,$userInfo->d_pass)){
                $request->session()->put('LoggedDealer', $userInfo->id);
                return redirect('dealerdashboard');
            }
            else{
                return back()->with('fail','Incorrect password');
            }
        }

    }

    function logout(){
        if(session()->has('LoggedDealer')){
            session()->pull('LoggedDealer');
            return redirect('dealerview');
        }
    }

    function dashboard(){
        $id=session('LoggedDealer', 'id');
        $dealer= ['LoggedUserInfo'=>DealerModel::where('id','=', session('LoggedDealer'))->first()];

        $dis=Dealeritem::where('d_id','=',$id)->get();
        return view ('dealerdash',$dealer)->with('dis',$dis);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $deal = DealerModel::where('id','!=','0')->get();
        //return $deal;
        return view('shopdealertable')->with('deal',$deal);
        
        
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
