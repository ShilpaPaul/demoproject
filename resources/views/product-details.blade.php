@extends("theme")
@section("content")
    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/prod_img.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Product Details</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    @if(Session::get('f'))
               <div class="alert alert-danger">
                  {{ Session::get('f') }}
               </div>
    @endif
    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div>
            <img src="{{ asset('uploads/item/'. $item->di_image) }}" alt="image" class="img-fluid wc-image">
            </div>
            <br>
            
          </div>

          <div class="col-md-8 col-xs-12">
            <!-- <form action="/customerbuyitem{{$item->id}}" method="post" class="form">
            {{csrf_field()}} -->
              <h2>{{$item->di_name}}</h2>

              <br>

              <p class="lead">
                <!-- <small><del> $999.00</del></small> -->
                <strong class="text-primary"> Rs.{{$item->view_price}}</strong>
              </p>

              <br>

              <p class="lead">
              {{$item->di_desc}}
              </p>

              <br> 

              <div class="row">
                
                

                      <div class="col-sm-2">
                      <!-- <button type="submit" onclick="Thanks()" class="btn btn-primary btn-block">BUY</button> -->
                      <a href="/viewbill{{$item->id}}" class="btn btn-primary btn-block">BUY</a>
                      </div>  
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <a href="/products">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

<script>
function Thanks() {
  alert("Thanks for buying!");
}
</script>

    @endsection

    <!-- Modal -->
   