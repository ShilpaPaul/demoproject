@extends("theme")
@section("content")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- ***** Preloader End ***** -->

    <!-- Header -->


    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>An exquisite antique shop</h4>
            <h2>HEIRLOOM</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
          
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Featured Products</h2>
              <a href="/products">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

            @foreach($dis as $di)
          <div class="col-md-4">
            <div class="product-item">
              <a href="/productdetail{{$di->id}}"><img class="img-fluid img-responsive" src="/fetch_image/{{ $di->id }}" alt="image"></a>
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

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Us</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <p><big>
              Heirloom – A benchmark in antiques and curios<br><br>
              Heirloom established in the year of 1989 is an exquisite antiques shop, one of the finest in Kerala. Located in the quaint old quarter of Mattanchery, Cochin, the shop has an alluring collection of antiques, curios, handicrafts, souvenirs and ancient memorabilia from all across India. <br><br> Rare antiques like religious artifacts, ancient brass-embedded wooden jewel boxes, Kerala’s celebrated traditional uruly, Chinese jars, ceramics, classic furniture, splendid sculptures, architectural marvels, magnificent murals – you name it, Heirloom has it.</big></p>
              <!-- <a href="about-us.html" class="filled-button">Read More</a> -->
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/about-1-570x350.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2><big>Happy Customers</big></h2>

              
            </div>
          </div>

          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Anamika Vijayan</h4>
                  <p class="n-m"><em>"Nice anitique shop in Jew's street Mattancherry Fort Kochi.Its the biggest shop and lot of collection.They have three antique shops in the Jew's street."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Jane Varghese</h4>
                  <p class="n-m"><em>"The store manages to amaze its customers in a subtle manner with pretty much every single artifact. The owners have done a really good job in making the store an experience to remember."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Antony Davis</h4>
                  <p class="n-m"><em>"Heirloom is a sea of ​​man-made structure that delights the eyes.  You have to go there at least once.  If not, you should own at least one antique and man-made item."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Anoop Krishna</h4>
                  <p class="n-m"><em>"They house a very good collection of genuine antiques, home decor pieces and quality wooden furniture. Highly capable of handling export shipments from India to literally any where globally. Truly a trust worthy enterprise."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Muhammed Salim</h4>
                  <p class="n-m"><em>"I’ve known Heirloom since the last 25+ years, It’s always been an upward for Heirloom,because of their innovative ideas,products and the trust.They have an excellent range of antique and handicraft products."</em></p>
                </div>
              </div>
              
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Anu Anoop</h4>
                  <p class="n-m"><em>"HEIRLOOM is one shop that should not be missed if you are on the look out for antiques that are genuine ,furniture that is elegant and traditional and jewellery that are unique. "</em></p>
                </div>
              </div>

        </div>
      </div>
    </div>
    </div>
    
              
             
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                
                  <h4><big>Esteemed Customers,</h4>
                  <p>
Please do not be misled by unscrupulous agents, drivers, touts and namesakes. We are based in Jew Town Road only.</big></p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="/contact" class="filled-button">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>   
@endsection