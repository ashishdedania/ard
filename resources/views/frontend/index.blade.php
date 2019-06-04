@extends('frontend.layouts.app')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide home-slider-section" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('css/project/images/home-slider.jpg') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('css/project/images/home-slider.jpg') }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('css/project/images/home-slider.jpg') }}" alt="Third slide">
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<section class="aboutus-section">
  <div class="container">
      <div class="row pb-6">
        <div class="col-md-6">
          <h2>About us</h2>
          <p>
          Stones by Rander is a stone processing and exporting company of Indian Origin. Our products are the culmination of centuries of nature’s perseverance and man’s craftsmanship. We have something for everyone, and every space.</p>
<p>With 100’s of containers exported every year around the world, our friendly and skilled team of dedicated and professional designers, estimators, and regional export specialists will answer all your questions, help you choose the best option that fits your budget, follow your project from specification to delivery, all while keeping you in the loop.</p>

<p>Are you a homeowner, builder, interior designer or project management company? Our team will work with your designers to help you realize your vision and conclude your project. A leading stone company is always at your service for any assistance. We strive to make your experience working with us a memorable and hassle free one.  </p>
  <button class="btn btn-secondary">Know more</button>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('css/project/images/about-pic.jpg') }}">
        </div>
      </div>

      <div class="row text-center why-stone-block">
          <div class="col-md-12">
            <h2>Why Stones By Rander?</h2>
          </div>
          <div class="col-md-12 stone-filed-wrapper">
            <ul>
              <li><i class="fas fa-chevron-right"></i>Unbelievable rates per square foot / m2 </li>
              <li><i class="fas fa-chevron-right"></i> Cut to size available at no extra cost </li>
              <li><i class="fas fa-chevron-right"></i> Transparent pricing </li>
              <li><i class="fas fa-chevron-right"></i> No child labor </li>
              <li><i class="fas fa-chevron-right"></i>Unbelievable rates per square foot / m2 </li>
              <li><i class="fas fa-chevron-right"></i> Cut to size available at no extra cost </li>
              <li><i class="fas fa-chevron-right"></i> Transparent pricing </li>
              <li><i class="fas fa-chevron-right"></i> No child labor </li>
            </ul>
          </div>


      </div>
  </div>
</section>


<section class="application-section">
  <div class="container">
      <h2>Versatility of application</h2>
      <ul class="app-listening">
        <li><a>
          <span class="icon-block">
            <img src="{{ asset('css/project/images/app-icon-1.jpg') }}" alt="">
          </span>
          Countertops</a></li>
        <li><a>
          <span class="icon-block">
            <img src="{{ asset('css/project/images/app-icon-2.jpg') }}" alt="">
          </span>
          Tables</a></li>
        <li><a>
          <span class="icon-block">
            <img src="{{ asset('css/project/images/app-icon-3.jpg') }}" alt="">
          </span>
          Interior Walls</a></li>
        <li><a>
          <span class="icon-block">
            <img src="{{ asset('css/project/images/app-icon-4.jpg') }}" alt="">
          </span>
          Facades</a></li>
        <li><a>
          <span class="icon-block">
            <img src="{{ asset('css/project/images/app-icon-5.jpg') }}" alt="">
          </span>
          Interior Floors</a></li>
        <li><a>
          <span class="icon-block">
            <img src="{{ asset('css/project/images/app-icon-6.jpg') }}" alt="">
          </span>
          Exterior Floors</a></li>
        <li><a>
          <span class="icon-block">
            <img src="{{ asset('css/project/images/app-icon-7.jpg') }}" alt="">
          </span>
          Staircases</a></li>
        <li><a>
          <span class="icon-block">
            <img src="{{ asset('css/project/images/app-icon-8.jpg') }}" alt="">
          </span>
          Bathroom Accessories</a></li>
        <li><a>
          <span class="icon-block">
            <img src="{{ asset('css/project/images/app-icon-9.jpg') }}" alt="">
          </span>
          Fire Places</a></li>
      </ul>
  </div>
</section>


<section class="mission-section">
  <div class="container">
      <h2>Mission statement, values & vision</h2>

      <div class="row">
      <div class="col blocks">
        <div class="mission-img">
          <img src="{{ asset('css/project/images/mission-statement-icon.png') }}">
        </div>

        <h3>Mission Statement</h3>
        <p>
        To serve and meet project requirements of all sizes
        To offer lasting rare and unique products for interiors
        To offer good value for money by offering fair pricing
        To encourage human craftsmanship
        To offer outstanding services to our customers with focused attitude to develop long-term relationships
        To generate and maintain satisfied clients</p>
      </div>
      <div class="col blocks">
        <div class="mission-img">
          <img src="{{ asset('css/project/images/values-icon.png') }}">
        </div>
        <h3>Mission Statement</h3>
        <p>
        To serve and meet project requirements of all sizes
        To offer lasting rare and unique products for interiors
        To offer good value for money by offering fair pricing
        To encourage human craftsmanship
        To offer outstanding services to our customers with focused attitude to develop long-term relationships
        To generate and maintain satisfied clients</p>
      </div>
      <div class="col blocks">
        <div class="mission-img">
          <img src="{{ asset('css/project/images/vision-icon.png') }}">
        </div>
        <h3>Mission Statement</h3>
        <p>
        To serve and meet project requirements of all sizes
        To offer lasting rare and unique products for interiors
        To offer good value for money by offering fair pricing
        To encourage human craftsmanship
        To offer outstanding services to our customers with focused attitude to develop long-term relationships
        To generate and maintain satisfied clients</p>
      </div>
    </div>
  </div>
</section>

<section class="testimonials-section">
<div class="container">

    <div class="row">
      <div class="col flex-grow-1">
        <h2>Customer Testimonials</h2>
        <div id="carouselExampleIndicators2" class="carousel slide testimonials-slider-section" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block" src="{{ asset('css/project/images/client-1.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <h5>Ethan, USA</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block" src="{{ asset('css/project/images/client-1.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <h5>Ethan, USA</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block" src="{{ asset('css/project/images/client-1.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <h5>Ethan, USA</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block" src="{{ asset('css/project/images/client-1.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <h5>Ethan, USA</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block" src="{{ asset('css/project/images/client-1.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <h5>Ethan, USA</h5>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </div>
      <div class="col-md-4 queries-block text-center">

          <h3>Any queries?</h3>
          <p>
  Please feel free to drop them in <br>
  or call us at <a href="#">+91-9819771878</a> </p>
  <button class="btn btn-secondary">Contact Us</button>


      </div>
    </div>


</div>
</section>


<section class="stone-talk-seaction">
    <div class="container position-relative">
          <div class="stone-block">
              Learn more <br>
about gemstones
<span>d interior design in our blog</span>
<h6 class="pb-3">”Stone Talk”<h6>

  <button class="btn btn-secondary">coming soon</button
          </div>
    </div>
</section>
@endsection
