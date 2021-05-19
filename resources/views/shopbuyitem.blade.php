@extends("shoptheme")
@section("content")

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
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    <h2>ADD ITEM</h2>
    <table class="table table-borderless">
    <form action=" /shopupdateitem{{$item->id}} " class="form-control" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <tr>
        <td>Product Name</td>
        <td><input type="text" value="{{$item->di_name}}" class="form-control" name="item_name"></td>
    </tr>
    <tr>
        <td>Product Description</td>
        <td><input type="text" value="{{$item->di_desc}}" class="form-control" name="item_description"></td>
    </tr>
    <tr>
        <td>Retail Price</td>
        <td><input type="number" class="form-control" name="item_price"></td>
    </tr>
    <tr>
        <td>Cost</td>
        <td>{{$item->di_price}}</td>
    </tr>
    <TR>
      <td>Product Image</td>
      <td><img src="{{ asset('uploads/item/'. $item->di_image) }}" width="100px" height="100px" alt="image"></td>
    </TR>

    <TR>
        <TD><button  class="btn btn-danger">ADD PRODUCT</button></TD>
    </TR>
    </form>
    </table>
    
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection