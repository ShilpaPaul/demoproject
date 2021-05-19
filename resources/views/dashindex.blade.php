@extends("shoptheme")
@section("content")
        <!-- Page Content  -->
        <br>
        <h1 class="mb-4">Dashboard</h1>
        <br>
        <div class="container">
        <div class="row">

        <div class="col col-12 col-xs-12 col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2">
                <div class="card" style="width: 20rem;">
                <div class="card-body">
                <h4 >CUSTOMERS</h4>
                <h5 class="card-subtitle mb-2 text-muted">Number of customers logged into the website</h5>
                <p class="card-text"><h3>{{$c_count}}</h3></p>
                <center>
                <a href="/shopcustomertable" class="card-link btn btn-primary">View Customer Details</a>
                </center>
                </div>
                </div>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <div class="col col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-2 col-xxl-2">
                <div class="card" style="width: 20rem;">
                <div class="card-body">
                <h4>SALES</h4>
                <h5 class="card-subtitle mb-2 text-muted">Number of sales occured via website</h5>
                <p class="card-text"><h3>{{$s_count}}</h3></p>
                <center>
                <a href="/shopsalestable" class="card-link btn btn-primary">View Sales Details</a>
                </center>
                </div>
                </div>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <div class="col col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-2 col-xxl-2">
                <div class="card" style="width: 20rem;">
                <div class="card-body">
                <h4>PRODUCTS</h4>
                <h5 class="card-subtitle mb-2 text-muted">Number of products listed in the website</h5>
                <p class="card-text"><h3>{{$i_count}}</h3></p>
                <center>
                <a href="/shopproducts" class="card-link btn btn-primary">View Products</a>
                </center>
                </div>
                </div>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <div class="col col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-2 col-xxl-2">
                <div class="card" style="width: 20rem;">
                <div class="card-body">
                <h4 >DEALERS</h4>
                <h5 class="card-subtitle mb-2 text-muted">Number of dealers logged into the website</h5>
                <p class="card-text"><h3>{{$d_count}}</h3></p>
                <CENTER>
                <a href="/shopdealertable" class="card-link btn btn-primary">View Dealer Details</a>
                </CENTER>
                </div>
                </div>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br>
        </div>
        </div>

@endsection