@extends("customertheme")
@section("user")
{{$LoggedUserInfo['c_name']}}
@endsection
@section("content")
        <!-- Page Content  -->
        <div class="container">
    <div class="row">
    
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

    <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    <h1>LOGIN</h1>
    <br>
    <form action=" /custpass{{$LoggedUserInfo['id']}} " method="post">
    @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
    @endif
    @if(Session::get('success'))
               <div class="alert alert-success">
                  {{ Session::get('success') }}
               </div>
    @endif
    {{csrf_field()}}
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Old Password</label>
    <input type="password" name='old_password' class="form-control" placeholder="" id="exampleInputEmail1" aria-describedby="emailHelp" >
    <span class="text-danger">
    @error('old_password'){{ $message }} @enderror
    </span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">New Password</label>
    <input type="password" name='new_password' class="form-control" id="exampleInputPassword1">
    <span class="text-danger">
    @error('new_password'){{ $message }} @enderror
    </span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" name='confirm_password' class="form-control" id="exampleInputPassword1">
    <span class="text-danger">
    @error('confirm_password'){{ $message }} @enderror
    </span>
  </div>
  
  
  <button type="submit" class="btn btn-danger">CHANGE PASSWORD</button>
</form>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection