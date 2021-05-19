@extends("shoptheme")
@section("content")

        <!-- Page Content  -->
    <br>
        <h1 class="mb-4">Product Details</h1>
    <br>
   
    
   
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
        @foreach($dis as $di)
    <tr>   
      <td>{{ $di->id }}</td>
      <td>{{ $di->di_name }}</td>
      <td>{{ $di->di_desc }}</td>
      <td><img src="{{ asset('uploads/item/'. $di->di_image) }}" width="100px" height="100px" alt="image"></td>
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
@endsection