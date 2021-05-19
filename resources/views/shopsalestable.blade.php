@extends("shoptheme")
@section("content")
<style>
hr.rounded {
  border-top: 3px solid #bbb;
  border-radius: 3px;
}
</style>

        <!-- Page Content  -->
    <br>
        <h1 class="mb-4">Sales Details</h1>
    <br>

    <div class="contanier">
    <div class="row">
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
    @if (count($data1)>0)
    <h2>Items to be delivered<br></h2>
   
    <table class="table table-stripped  table-responsive">
    <thead class="thead-dark">
    <tr class="dark">
      <th scope="col" class="text-center">ITEM ID</th>
      <th scope="col"class="text-center">CUSTOMER ID</th>
      <th scope="col"class="text-center">ITEM NAME</th>
      <th scope="col"class="text-center">ITEM IMAGE</th>
      <th scope="col"class="text-center">PRICE</th>
      <th scope="col"class="text-center">DATE</th>
      <th scope="col"class="text-center">ADDRESS</th>
      <th scope="col"class="text-center">CHECK IF DELIVERED</th>
      </tr>
  </thead>
  <tbody>
        @foreach($data1 as $di)
    <tr>   
    <form action="/delivered{{ $di->id }}" method="post">
    {{csrf_field()}}
      <td>{{ $di->id }}</td>
      <td>{{ $di->c_id }}</td>
      <td>{{ $di->di_name }}</td>
      <td><img src="{{ asset('uploads/item/'. $di->di_image) }}" width="100px" height="100px" alt="image"></td>
      <td>{{ $di->view_price }}</td>
      <td>{{ $di->created_at->format('d-m-Y') }}</td>
      <td>{{ $di->address }}</td>
      <td class="text-center">
      <div class="form-check">
      <input class="form-check-input" type="checkbox" value="{{ $di->id }}" name="checked[]" id="flexCheckDefault">
      </div>
      </td>
    </tr>
        @endforeach
  </tbody>
  </table>
  <br>
  <button type="submit" class="btn btn-success">Confirm Delivery</button>
  <br>
  </form>
  </div>
  </div>
  <br><br><br>
  <hr class="rounded">
  <br>

  @endif
  
  
  @if (count($data2)>0)
  <div class="container">
<div class="row">
<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
<h2>Sales history</h2>
<br>
<form action="/search" method="post">
{{csrf_field()}}
From <input type="date" name="from" id="from" min="05/05/2021" max="05/05/2022"> To <input type="date" name="to" id="to" min="05/05/2021" max="05/05/2022">
&nbsp;&nbsp;<button type="submit" class="btn btn-primary">View Details</button>
@if(Session::get('f'))
<span class=" text-danger">
                  {{ Session::get('f') }}
</span>
@endif<br>
</form>

<br>
<table class="table table-stripped  table-responsive  ">
    <thead class="thead-dark">
    <tr class="dark">
      <th scope="col">ORDER ID</th>
      <th scope="col">CUSTOMER ID</th>
      <th scope="col">ITEM NAME</th>
      <th scope="col">ITEM IMAGE</th>
      <th scope="col">PURCHASE COST</th>
      <th scope="col">RETAIL PRICE</th>
      <th scope="col">PROFIT</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>
        @foreach($data2 as $di)
    <tr>   
      <td>{{ $di->id }}</td>
      <td>{{ $di->c_id }}</td>
      <td>{{ $di->di_name }}</td>
      <td><img src="{{ asset('uploads/item/'. $di->di_image) }}" width="100px" height="100px" alt="image"></td>
      <td>{{ $di->di_price }}</td>
      <td>{{ $di->view_price }}</td>
      <th>{{ $di->view_price-$di->di_price }}</th>
      <td>{{ $di->created_at->format('m-d-Y') }}</td>
    </tr>
        @endforeach
  </tbody>
  </table>
  </div>
  </div>
  </div>
  </div>
  @endif
  </div>
  <script>
  var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("to").setAttribute("max", today);
document.getElementById("from").setAttribute("max", today);
var mindate=new Date();
mindate="2021-05-18";
document.getElementById("from").setAttribute("min",mindate );
document.getElementById("to").setAttribute("min",mindate );
  

  </script>
@endsection