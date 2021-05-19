@extends("shoptheme")
@section("content")

        <!-- Page Content  -->
    <br>
        <h1 class="mb-4">Dealer Details</h1>
    <br>
   
    
   
    <table class="table table-stripped  table-responsive  ">
    <thead class="thead-dark">
    <tr class="dark">
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE NUMBER</th>
      <th scope="col">DATE JOINED</th>
    </tr>
  </thead>
  <tbody>
        @foreach($deal as $di)
    <tr>   
      <td>{{ $di->id }}</td>
      <td>{{ $di->d_name }}</td>
      <td>{{ $di->d_mail }}</td>
      <td>{{ $di->d_phone }}</td>
      <td>{{ $di->created_at->format('d-m-Y') }}</td>
    </tr>
        @endforeach
  </tbody>
  </table>
@endsection