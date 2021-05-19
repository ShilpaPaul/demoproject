<!doctype html>
<html lang="en">
  <head>
  	<title>Heirloom</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
	  		<h1><a style="font-size: 1.100em;"  class="logo"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp; @yield("user")</a> </h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="/" class="text-decoration-none"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
              <a href="/customerdashboard"  ><span class="fa fa-user mr-3"></span> Dashboard</a>
          </li>
          <li>
            <a href="/customerpassword"  class="text-decoration-none"><span class="glyphicon glyphicon-asterisk"></span>&nbsp;&nbsp; Change Password</a>
          </li>
          <li>
            <a href="/products"  class="text-decoration-none"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp; Products</a>
          </li>
          <li>
            <a href="{{ route('customerlogout') }}"   class="text-decoration-none" ><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp; Logout</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      @yield("content")
		</div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>