@extends("shoptheme")
@section("content")

  
        <!-- Page Content  -->
    <br>
        <h1 class="mb-4">Purchase Order</h1>
    <br>
    @if(count($data1)>0)
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
   
   <div class="row">
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
        @foreach($data1 as $di)
        <tr class="table-row" data-href="/details{{$di->id}}{{$di->d_id}}">
       {{csrf_field()}}
      <td>{{ $di->id }}</td>
      <td>{{ $di->di_name }}</td>
      <td>{{ $di->di_desc }}</td>
      <td>{{ $di->di_price }}</td>
      <td><img src="/fetch_image/{{ $di->id }}" width="100px" height="100px" alt="image"></td>
      <th>{{ $di->di_status }}</th>
      <!-- <th><a href="/details{{$di->id}}" class="btn btn-primary">VIEW DETAILS</a></th> -->

    </tr>
        @endforeach
  </tbody>
  </table>
  @else
  <p class="text-dark"><h4>Nil</h4></p>
  @endif
  </div>
  <div class="row">
  <br>
        <h1 class="mb-4">Purchase History</h1>
   <br>
  @if(count($data2)>0)
  <table class="table table-stripped  table-responsive  ">
    <thead class="thead-dark">
    <tr class="dark">
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">ITEM DESCRIPTION</th>
      <th scope="col">ITEM IMAGE</th>
      <th scope="col">COST</th>
      <th scope="col">RETAIL PRICE</th>
      <th scope="col">PURCHASED FROM</th>
    </tr>
  </thead>
  <tbody>
        @foreach($data2 as $di)
    <tr>   
      <td>{{ $di->id }}</td>
      <td>{{ $di->di_name }}</td>
      <td>{{ $di->di_desc }}</td>
      <td>
      <img src="/fetch_image/{{ $di->id }}"  width="100px" height="100px" />
      </td>
      <td>{{ $di->di_price }}</td>
      <td>{{ $di->view_price }}</td>
      <td>
        @if ($di->d_id == 1)
       Not from dealer
        @else
        {{ $di->d_name }}
        @endif
      </td>
    </tr>
        @endforeach
  </tbody>
  </table>
  @else
  <p class="text-dark"><h4>No Purchase History</h4></p>
  @endif
  </div>
  </div>
@endsection