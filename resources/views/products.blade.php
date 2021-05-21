@extends("theme")
@section("content")
    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/prod_img.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand"></a>
  <form class="form-inline" action="/productsearch" method="POST">
  {{csrf_field()}}
    <input class="form-control mr-sm-2" type="search" name="hint" placeholder="Search" aria-label="Search" required/>
    <button class="btn btn-outline-dark my-2 my-sm-0"  type="submit">Search</button>
  </form>
</nav>

    <div class="products">
    <div class="container">
    <div class="row">

    @foreach($dis as $di)
          <div class="col-md-4">
            <div class="product-item">
              <a href="/productdetail{{$di->id}}"><img class="img-fluid img-responsive" src="{{ asset('uploads/item/'. $di->di_image) }}" alt="image"></a>
              <div class="down-content">
                <a href="/productdetail{{$di->id}}"><h4>{{ $di->di_name }}</h4></a>
                <h6>
                <!-- <small><del>$99.00</del></small>  -->
                Rs. {{ $di->view_price }}</h6>
                <p>{{ $di->di_desc }}</p>
              </div>
            </div>
          </div>
    @endforeach


    @endsection
