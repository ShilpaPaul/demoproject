@extends("shoptheme")
@section("content")

  
        <!-- Page Content  -->
    <br>
        <h1 class="mb-4">Purchase Order</h1>
    <br>
    @if(count($dis)>0)
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
    <div class="container">
   
   
    <table class="table table-stripped table-hover table-responsive  ">
    <thead class="thead-dark">
    <tr class="dark">
    <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">PRICE</th>
      <th scope="col">IMAGE</th>
      <th scope="col">STATUS</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        @foreach($dis as $di)
        <tr class="table-row" data-href="/details{{$di->id}}{{$di->d_id}}">
       {{csrf_field()}}
      <td>{{ $di->id }}</td>
      <td>{{ $di->di_name }}</td>
      <td>{{ $di->di_desc }}</td>
      <td>{{ $di->di_price }}</td>
      <td><img src="{{ asset('uploads/item/'. $di->di_image) }}" width="100px" height="100px" alt="image"></td>
      <th>{{ $di->di_status }}</th>
      <!-- <th><a href="/details{{$di->id}}" class="btn btn-primary">VIEW DETAILS</a></th> -->

    </tr>
        @endforeach
  </tbody>
  @endif
@endsection