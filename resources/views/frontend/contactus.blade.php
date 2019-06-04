@extends('frontend.layouts.app')

@section('content')

<section class="about-seaction">
  <div class="container">
        <div class="row">
          <div class="about-b-content col-md-12">
            <h2>Contact Us</h2>
            <div class="social-icons">share
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
          </div>

        </div>


        <div class="row mb-5">
            <div class="col-md-12 col-lg-7">
              <div class="row">
                <div class="col location-list-wrapper">
                  <h4>Stones By Rander (Registered Off)</h4>
                  <ul class="location-list">
                    <li>
                      <i class="fas fa-chevron-right"></i>
                      <span class="label">phone:</span>
                      + 91 - 9819771878 / 9892265143
                    </li>
                    <li>
                      <i class="fas fa-chevron-right"></i>
                      <span class="label">email:</span>
                      Info@stonesbyrander.com
                    </li>
                    <li>
                      <i class="fas fa-chevron-right"></i>
                      <span class="label">address:</span>
                      Rizvi Park, S.V Road, Santacruz (W) Mumbai 054. INDIA
                    </li>
                    <li>
                      <i class="fas fa-chevron-right"></i>
                      <span class="label"> find shop on the map <img src="{{ asset('css/project/images/location.png') }}" alt="location"></span>

                    </li>
                  </ul>

                  <h4>For marketing:</h4>
                  <ul class="location-list">
                    <li>
                      <i class="fas fa-chevron-right"></i>
                      <span class="label">Mr. Aadil Rander</span>
                      <a href="mailto:Marketing@stonesbyrander.com">Marketing@stonesbyrander.com </a>
                    </li>

                  </ul>
                </div>
                <div class="col location-list-wrapper">
                  <h4>Stones By Rander (Factory)</h4>
                  <ul class="location-list">
                    <li>
                      <i class="fas fa-chevron-right"></i>
                      <span class="label">phone:</span>
                      + 91 - 9819771878 / 9892265143
                    </li>
                    <li>
                      <i class="fas fa-chevron-right"></i>
                      <span class="label">email:</span>
                      Info@stonesbyrander.com
                    </li>
                    <li>
                      <i class="fas fa-chevron-right"></i>
                      <span class="label">address:</span>
                      Ali Chambers, Bye Pass Road Makrana 341505 Rajasthan. INDIA

                    </li>
                    <li>
                      <i class="fas fa-chevron-right"></i>
                      <span class="label"> find shop on the map <img src="{{ asset('css/project/images/location1.png') }}" alt="location"></span>

                    </li>
                  </ul>
                  <h4>For sales:</h4>
                  <ul class="location-list">
                    <li>
                      <i class="fas fa-chevron-right"></i>
                      <span class="label">Mr. Aabid Rander</span>
                      <a href="mailto:Sales@stonesbyrander.com">Sales@stonesbyrander.com</a>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-5">
              <div id="googleMap" style="width:100%;height:400px;">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.4142086575107!2d72.83567721485151!3d19.08947638708018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9fcf794986b%3A0xafc45ea6125c7dc5!2sRizvi+Park!5e0!3m2!1sen!2sin!4v1559111652569!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
        </div>


        <div class="row contactus-form">
          <div class="col-md-6">
            <input type="text" class="form-control mb-3" placeholder="Name">
            <input type="text" class="form-control mb-3" placeholder="Contact Number">
            <input type="text" class="form-control mb-3" placeholder="Email Id">
          </div>
          <div class="col-md-6">
            <textarea class="form-control" placeholder="Message mb-3"></textarea>
          </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
              <button class="btn send-btn btn-secondary float-right">SEND</button>
            </div>
        </div>

  </div>
<section>
    
@endsection
