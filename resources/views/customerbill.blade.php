@extends("customertheme")
@section("user")
{{$cname}}
@endsection
@section("content")

<br>
 
<h1>Purchase Bill</h1>
<br>
    <div class="container">
    <form action="/customerbuyitem{{$di['id']}}" method="post">
    {{csrf_field()}}
    <div class="row">
    <div class="jumbotron">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
        
        <img src="{{ asset('uploads/item/'. $di['di_image']) }}" class="img-fluid" alt="image">
        
        </div>
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-6">
    <br>
    <br>
    <table class="table table-borderless">
    <tbody>
    <tr>  <th scope="col">ITEM ID</th><td>{{ $di['id'] }}</td></tr>
    <tr>  <th scope="col">NAME</th><td>{{ $di['di_name'] }}</td></tr>
    <tr>  <th scope="col">DESCRIPTION</th><td>{{ $di['di_desc'] }}</td></tr>
    <tr>  <th scope="col">PURCHASE DATE</th><td>{{ date('d-m-Y')}}</td></tr>
    <tr>  <th scope="col">ADDRESS</th><td><textarea name="address" id="" cols="30" rows="4"></textarea>
    &nbsp;<span class=" text-danger">
    <small>@error('address')*{{ $message }} @enderror</small>
    </span></td>
    </tr>
    <tr>  <th scope="col">MODE OF PAYMENT</th><td>
    
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="" name="checkcash" id="flexCheckChecked" checked>
    <label class="form-check-label" for="flexCheckChecked">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cash On Delivery
    </label>
    </div>
    <br>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled>
    <label class="form-check-label" for="flexCheckDisabled">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Online Payment
    </label>
    </div>
    
    
    </td></tr>
    
    <br>
    <tr><td scope="col"><br><b><big>TOTAL AMOUNT</big><br></td><td><br><b><big>{{ $di['view_price'] }}.00</big></b></td></tr>
    <tr>
    <td>
    <br><br><button type="submit" class="btn btn-success">Confirm Order</button>
    </td>
    <td></td>
    </tr>
    </tbody>
    </table>
    </form>
    </div>

    </div>
    </div>
   
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@endsection