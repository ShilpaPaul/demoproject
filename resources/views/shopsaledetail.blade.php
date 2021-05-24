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
        <h1 class="mb-4">Order Details</h1>
    <br>
    @if(Session::get('f'))
               <div class="alert alert-danger">
                  {{ Session::get('f') }}
               </div>
    @endif
    @if(Session::get('t'))
               <div class="alert alert-success">
                  {{ Session::get('t') }}
               </div>
    @endif 
        @if(Session::get('fail'))
               <div class="alert alert-warning">
                  {{ Session::get('fail') }}
               </div>
    @endif
    <br>
    <div class="container">
    <div class="row">
    <!-- <div class="jumbotron"> -->
        
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-6">
    <h2 class="mb-4">Customer Details</h2>
    <br>
    <table class="table table-borderless">
    <tbody>
    <tr>  <th scope="col">ID</th><td>{{ $di['id'] }}</td></tr>
    <tr>  <th scope="col">CUSTOMER NAME</th><td>{{ $di['c_name'] }}</td></tr>
    <tr>  <th scope="col">ADDRESS</th><td>{{ $di['address'] }}</td></tr>
    <tr>  <th scope="col">EMAIL</th><td>{{ $di['c_mail'] }}</td></tr>
    <tr>  <th scope="col">PHONE NUMBER</th><td>{{ $di['c_phone'] }}</td></tr>
    </tbody>
    </table>
    <!-- </div> -->
    </div>
    </div>

    <hr class="rounded">
    <br>
    <h2 class="mb-4">Item Details</h2>
    <br>

    <div class="row">
   
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
        
        <img src="/fetch_image/{{ $di->item_id }}" class="img-fluid" alt="image">
        
        </div>
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    <table class="table table-borderless">
    <tbody>
    <tr>  <th scope="col">ID</th><td>{{ $di['id'] }}</td></tr>
    <tr>  <th scope="col">NAME</th><td>{{ $di['di_name'] }}</td></tr>
    <tr>  <th scope="col">DESCRIPTION</th><td>{{ $di['di_desc'] }}</td></tr>
    <tr>  <th scope="col">PRICE</th><td>{{ $di['di_price'] }}</td></tr>
    <tr>  <th scope="col">STATUS</th><td>{{ $di['di_status'] }}</td></tr>
    </tbody>
    </table>
    </div>

    <!-- <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
        
    </div> -->

    </div>


    </div>
    
@endsection