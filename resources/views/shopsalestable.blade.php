@extends("shoptheme")
@section("content")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
hr.rounded {
  border-top: 3px solid #bbb;
  border-radius: 3px;
}
/* td.hov{
  background-color: #e8e8e8;
} */
table td:hover {
    background-color: #e8e8e8;
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
   
    <table class="table table-stripped table-hover table-responsive">
    <thead class="thead-dark">
    <tr class="dark">
    <th scope="col" class="text-center">ORDER ID</th>
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
      <tr  class="table-row"  data-href="/orderdetails{{ $di->id }}">
    <form action="/delivered{{ $di->id }}" method="post">
    {{csrf_field()}}
      <th style="font-weight:normal">{{ $di->id }}</th>
      <th style="font-weight:normal">{{ $di->item_id }}</th>
      <th style="font-weight:normal">{{ $di->c_id }}</th>
      <th style="font-weight:normal">{{ $di->di_name }}</th>
      <th style="font-weight:normal"><img src="/fetch_image/{{ $di->item_id }}" width="100px" height="100px" alt="image"></th>
      <th style="font-weight:normal">{{ $di->view_price }}</th>
      <th style="font-weight:normal">{{ $di->created_at->format('d-m-Y') }}</th>
      <th style="font-weight:normal">>{{ $di->address }}</th>
      <th style="font-weight:normal" class="text-center">
      <div class="form-check">
      <input class="form-check-input" type="checkbox" value="{{ $di->item_id }}" name="checked[]" id="flexCheckDefault">
      </div>
      </th>
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
      <th scope="col" class="hover">ORDER ID</th>
      <th scope="col" >CUSTOMER ID</th>
      <th scope="col">ITEM ID</th>
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
      <th style="font-weight:normal">{{ $di->id }}</th>
      <td>
      <a data-toggle="tooltip" data-placement="bottom" title="{{ $di->c_name }}&nbsp; Phone no:{{ $di->c_phone }}">
      <p>{{ $di->c_id }}</p>
      </a>
      </td>
      <th style="font-weight:normal">{{ $di->item_id }}</th>
      <th style="font-weight:normal">{{ $di->di_name }}</th>
      <th style="font-weight:normal"><img src="/fetch_image/{{ $di->item_id }}" width="100px" height="100px" alt="image"></td>
      <th style="font-weight:normal">{{ $di->di_price }}</th>
      <th style="font-weight:normal">{{ $di->view_price }}</th>
      <th style="font-weight:normal">{{ $di->view_price-$di->di_price }}</th>
      <th style="font-weight:normal">{{ $di->created_at->format('m-d-Y') }}</th>
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

  <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
  })

  $(function () {
  $('[data-toggle="popover"]').popover()
  })

  $(function () {
  $('.example-popover').popover({
    container: 'body'
  })
  })

  </script>
@endsection