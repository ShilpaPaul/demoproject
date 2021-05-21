@extends("dealertheme")
@section("content")
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">-->

@section("user")
{{$LoggedUserInfo['d_name']}}
@endsection
<br>
<br>
    <div class="container">
    <div class="row">
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

    </div>
    <div class="row">
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    <h1>ADD ITEM</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <table class="table table-borderless">
    <form action="{{ route('storeitem') }}" class="form-control" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <tr>
        <td>Item Name</td>
        <td><input type="text" class="form-control" name="item_name"></td>
    </tr>
    <tr>
        <td>Item Description</td>
        <td><input type="text" class="form-control" name="item_description"></td>
    </tr>
    <tr>
        <td>Item Price</td>
        <td><input type="number" class="form-control" name="item_price"></td>
    </tr>
    <TR>
        <TD>Upload Image</TD>
        <TD><div class="mb-3">
  <input class="form-control"  name="item_image" type="file" id="formFile">
</div></TD>
    </TR>

    <TR>
        <TD><button class="btn btn-danger">ADD ITEM</button></TD>
        <td></td>
    </TR>
    </form>
    </table>
    
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection