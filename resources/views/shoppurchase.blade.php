<!doctype html>
<html lang="en">
  <head>
  	<title>Heirloom</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="#" class="logo"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp; Shopkeeper</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="/"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
              <a href="/shopdashboard"><span class="fa fa-user mr-3"></span> Dashboard</a>
          </li>
          <li>
            <a href="{{ route('shopsalestable') }}"><span class="glyphicon glyphicon-usd"></span>&nbsp;&nbsp; Sales</a>
          </li>
          <li>
            <a href="{{ route('shopadditem') }}"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp; Add Products</a>
          </li>
          <li>
            <a href="{{ route('shopdealer') }}"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp; Purchase</a>
          </li>
          <li>
            <a href="/shopmessages"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp; Show Messages</a>
          </li>
          <li>
            <a href="{{ route('shopkeeperlogout') }}"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp; Logout</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
<style>
hr.rounded {
  border-top: 3px solid #bbb;
  border-radius: 3px;
}
</style>
        <!-- Page Content  -->
    <br>
        <h1 class="mb-4">Item Details</h1>
    <br>
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
    <br>
    <div class="container">
    <div class="row">
    <div class="jumbotron">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
        
        <img src="/fetch_image/{{ $di->id }}" class="img-fluid" alt="image">
        
        </div>
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-6">
    <br>
    <br>
    <table class="table table-borderless">
    <tbody>
    <tr>  <th scope="col">ID</th><td>{{ $di['id'] }}</td></tr>
    <tr>  <th scope="col">NAME</th><td>{{ $di['di_name'] }}</td></tr>
    <tr>  <th scope="col">DESCRIPTION</th><td>{{ $di['di_desc'] }}</td></tr>
    <tr>  <th scope="col">PRICE</th><td>{{ $di['di_price'] }}</td></tr>
    <tr>  <th scope="col">STATUS</th><td>{{ $di['di_status'] }}</td></tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>

    <hr class="rounded">
    <br>
    <h1 class="mb-4">Dealer Details</h1>
    <br>

    <div class="row">
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    <table class="table table-borderless">
    <tbody>
    <tr>  <th scope="col">ID</th><td>{{ $dealer['id'] }}</td></tr>
    <tr>  <th scope="col">DEALER NAME</th><td>{{ $dealer['d_name'] }}</td></tr>
    <tr>  <th scope="col">EMAIL</th><td>{{ $dealer['d_mail'] }}</td></tr>
    <tr>  <th scope="col">PHONE NUMBER</th><td>{{ $dealer['d_phone'] }}</td></tr>
    </tbody>
    </table>
    </div>

    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
        <center>
        <a href="/shopbuyitem{{$di['id']}}" class="btn btn-success">&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;&nbsp;  BUY  &nbsp;&nbsp; </a>
        <br>
        <br>
        <form action="/delete{{$di['id']}}" method="post">{{csrf_field()}}<button type="submit" onclick="return confirm('Are you sure want to reject this item?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp; REJECT</button></form> 
        </center>
    </div>

    </div>


    </div>
    
  
        
       
        
      
      
      
      
      
      
      
</div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>