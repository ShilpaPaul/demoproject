@extends("theme")
@section("content")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<br>
<br>
<br>
<br>
<br>
<br>


    <div class="container">
    <div class="row">
    @if(Session::get('fail'))
               <div class="alert alert-warning">
                  {{ Session::get('fail') }}
               </div>
    @endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
    <div class="row">
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    <h2>CUSTOMER LOGIN</h2>
    <form action="{{ route('customerlogin') }}" method="post">
    
    {{csrf_field()}}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Email">
    <span class=" text-danger">
        <small>@error('Email'){{ $message }} @enderror</small>
    </span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="Password" class="form-control" id="exampleInputPassword1" name="Password">
    <span class=" text-danger">
        <small>@error('Password'){{ $message }} @enderror</small>
        </span>
  </div>
  
  <br>
  <button type="submit" class="btn btn-danger">LOGIN</button>
  <br>
</form>
    
    </div>
<br>
    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    
    <h2>CUSTOMER SIGN-IN</h2>
    <table class="table table-borderless">
    <form action="/cread" class="form-control" method="post">
    @if(Session::get('fail1'))
               <div class="alert alert-danger">
                  {{ Session::get('fail1') }}
               </div>
    @endif
    {{csrf_field()}}
    <tr>
        <td>Name</td>
        <td><input type="text" class="form-control" name="name"></td>
        <td>
        <span class=" text-danger">
        <small>@error('name'){{ $message }} @enderror</small>
        </span>
        </td>
    </tr>
    
    <tr>
        <td>Phone no</td>
        <td><input type="number" class="form-control" name="phone_no"></td>
        <td>
        <span class=" text-danger">
        <small>@error('phone_no'){{ $message }} @enderror</small>
        </span>
        </td>
    </tr>
    <tr>
        <td>Email Id</td>
        <td><input type="email" class="form-control" name="c_mail"></td>
        <td>
        <span class=" text-danger">
        <small>@error('c_mail'){{ $message }} @enderror</small>
        </span>
        </td>
    </tr>
    <tr>
        <TD>Password</TD>
        <TD><input type="password" class="form-control"  name="password"></TD>
        <td>
        <span class=" text-danger">
        <small>@error('password'){{ $message }} @enderror</small>
        </span>
        </td>
    </tr>
    <TR>
        <TD>Confirm Password</TD>
        <TD><input type="password"  class="form-control"  name="confirm_password"></TD>
        <td>
        <span class=" text-danger">
        <small>@error('confirm_password'){{ $message }} @enderror</small>
        </span>
        </td>
    </TR>
    <TR>
        <TD><button class="btn btn-danger">SIGN-IN</button></TD>
    </TR>
    </form>
    </table>
   
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection