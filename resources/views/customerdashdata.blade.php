@extends("customertheme")
@section("user")
{{ $cname }}
@endsection
@section("content")
<style>
hr.rounded {
  border-top: 3px solid #bbb;
  border-radius: 3px;
}
</style>
    <div class="container">
    @if(count($data1)>0)
    <br>
    <h1>Orders Placed</h1>
    <br>
    @foreach($data1 as $di)
    <div class="row">
    <div class="jumbotron">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
        
        <img src="/fetch_image/{{ $di['item_id'] }}" class="img-fluid" alt="image">
        
        </div>
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-6">
    <br>
    <br>
    <table class="table table-borderless">
    <tbody>
    <tr>  <th scope="col">ORDER ID</th><td>{{ $di['id'] }}</td></tr>
    <tr>  <th scope="col">NAME</th><td>{{ $di['di_name'] }}</td></tr>
    <tr>  <th scope="col">DESCRIPTION</th><td>{{ $di['di_desc'] }}</td></tr>
    <tr>  <th scope="col">PRICE</th><td>{{ $di['view_price'] }}</td></tr>
    <tr>  <th scope="col">PURCHASE DATE</th><td>{{ $di->created_at->format('d-m-Y')}}</td></tr>
    <tr>  <th scope="col">DELIVERING TO</th><td>{{ $di->address }}</td></tr>
    </tbody>
    </table>
    </div>

    </div>
    </div>
    @endforeach
    @endif

    @if(count($data2)>0)
    <br>
    <hr class="rounded">
    <br>
    <h1>Purchase History</h1>
    <br><br>
    @foreach($data2 as $di)
    <div class="row">
    
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
        
        <img src="/fetch_image/{{ $di['item_id'] }}" class="img-fluid" alt="image">
        
        </div>
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    <br>
    <br>
    <table class="table table-borderless">
    <tbody>
    <tr>  <th scope="col">ORDER ID</th><td>{{ $di['id'] }}</td></tr>
    <tr>  <th scope="col">NAME</th><td>{{ $di['di_name'] }}</td></tr>
    <tr>  <th scope="col">DESCRIPTION</th><td>{{ $di['di_desc'] }}</td></tr>
    <tr>  <th scope="col">PRICE</th><td>{{ $di['view_price'] }}</td></tr>
    <tr>  <th scope="col">PURCHASE DATE</th><td>{{ $di->created_at->format('d-m-Y')}}</td></tr>
    <tr>  <th scope="col">DELIVERED TO</th><td>{{ $di->address }}</td></tr>
    </tbody>
    </table>
    </div>
    </div>
    <br>
    <div class="jumbotron"></div>
    @endforeach
    
    @else
    <p class="text-dark"><h4>No Purchases</h4></p>
    @endif
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@endsection