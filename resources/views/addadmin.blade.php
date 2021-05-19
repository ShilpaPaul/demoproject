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
    <h2>LOGIN</h2>
    <br>
    <form action="/addadmin" method="post">
    @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
    @endif
    {{csrf_field()}}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name='email' class="form-control" placeholder="" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old ('email')}}">
    <span class="text-danger">
    @error('email'){{ $message }} @enderror
    </span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1">
    <span class="text-danger">
    @error('password'){{ $message }} @enderror
    </span>
  </div>
  <div class="mb-3 form-check">
    
  </div>
  
  
  <button type="submit" class="btn btn-danger">SAVE</button>
</form>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection