<?php

namespace App\Http\Controllers;
use App\Models\Dealeritem;
use App\Models\Sales;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'address'=>'required',
        ]);

        $item=Dealeritem::find($id);
        $item->di_status="not delivered";

        $cust_id=session('LoggedCustomer', 'id');
        $sale=new Sales();
        $sale->c_id=$cust_id;
        $sale->item_id=$id;
        $sale->address=$request->input('address');
        
        $save1=$sale->save();
        $save2=$item->save();

        if($save1 && $save2){
            return redirect('customerdashboard');
        }
        else
        {
            return back()->with('f','Somthing went wrong, Please try again later');
        }
    }

    public function shopview()
    {
        $data1 = Sales::join("customers","customers.id","=","sales.c_id")
        ->join("dealeritems","dealeritems.id","=","sales.item_id")
        ->where("dealeritems.di_status","=","not delivered")
        ->select("dealeritems.id","sales.c_id","dealeritems.di_name","dealeritems.di_image","dealeritems.view_price","sales.created_at","sales.address")->get();
        

        $data2 = Sales::join("customers","customers.id","=","sales.c_id")
        ->join("dealeritems","dealeritems.id","=","sales.item_id")
        ->where("dealeritems.di_status","=","stockout")
        ->select("sales.id","sales.c_id","dealeritems.di_name","dealeritems.di_image","dealeritems.di_price","dealeritems.view_price","sales.created_at")
        ->get();
        
       
            return view('shopsalestable')->with('data1',$data1)->with('data2',$data2);
        
    }

    public function update(Request $request,$id)
    {
        $checked_ids=$request->checked;
        if($checked_ids)
        {
        foreach($checked_ids as $checkid)
        {
            $item=Dealeritem::find($checkid);
            $item->di_status="stockout";
            $item->save();
        }
        } 
        
        return back();
    }

    public function search(Request $request)
    {
        
        $from=$request->input('from');
        $to=$request->input('to');
        
        if($to<$from)
        {
            return redirect('shopsalestable')->with('f','Invalid date');
        }

        $data1 = Sales::join("customers","customers.id","=","sales.c_id")
        ->join("dealeritems","dealeritems.id","=","sales.item_id")
        ->where("dealeritems.di_status","=","not delivered")
        ->select("dealeritems.id","sales.c_id","dealeritems.di_name","dealeritems.di_image","dealeritems.view_price","sales.created_at","sales.address")->get();
        

        $data2 = Sales::join("customers","customers.id","=","sales.c_id")
        ->join("dealeritems","dealeritems.id","=","sales.item_id")
        ->where("dealeritems.di_status","=","stockout")
        ->whereBetween("sales.created_at", [$from." 00:00:00", $to." 23:59:59"])
        ->select("sales.id","sales.c_id","dealeritems.di_name","dealeritems.di_image","dealeritems.di_price","dealeritems.view_price","sales.created_at")
        ->get();
        
       
            return view('shopsalestable')->with('data1',$data1)->with('data2',$data2);
    }

}
