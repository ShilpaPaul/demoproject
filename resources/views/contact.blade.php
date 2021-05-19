@extends("theme")
@section("content")

    <!-- Page Content -->
    <div class="page-heading contact-heading header-text" style="background-image: url(assets/images/phone_img.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Location on Maps</h2>
            </div>
          </div>
          <div class="col-md-8">
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
            <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1964.8663937652225!2d76.25710501892111!3d9.956176083428874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b086dac0f43a05f%3A0xa2b21ac8d7bdca08!2sJew%20town!5e0!3m2!1sen!2sin!4v1621046609822!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4><big>Address</h4>
              <p>Heirloom Antiques, Moulana Azad Rd, Jew Town, Kappalandimukku, Mattancherry, Kochi, Kerala 682002<br><br>Phone Number:<br>+91 9845771222<br>+91 8086517928</big></p>
              <ul class="social-icons">
                <li><a href="https://www.facebook.com/pages/category/Landmark---Historical-Place/Mattancherry-the-Jewish-TOWN-100532392015795/"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/hashtag/jewtown?lang=en#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Send us a Message</h2>
            </div>
          </div>
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <div class="col-md-8">
            <div class="contact-form">
              <form action="/message" method="post">
              {{csrf_field()}}
              
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="email" class="form-control" id="email" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit"  class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
          
          <div class="col-md-4">
          <center>
            <img src="assets/images/halogo.png" class="img-fluid" alt="">
            <h5 class="text-center" style="margin-top: 15px;">&nbsp;&nbsp;&nbsp;HEIRLOOM ANTIQUES</h5>
            </center> 
            
          
          </div>
          

        </div>
      </div>
    </div>

@endsection