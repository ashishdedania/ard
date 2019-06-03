@extends('frontend.layouts.app')

@section('content')

<section class="collection-slider">
  <div id="carouselExampleIndicators" class="carousel slide home-slider-section" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('css/project/images/collection-slider-1.jpg') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('css/project/images/collection-slider-1.jpg') }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('css/project/images/collection-slider-1.jpg') }}" alt="Third slide">
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
</section>
<section class="collection-seaction">
  <div class="container">

    <h2 class="collection-title">Collections</h2>


    <div class="row">
        <div class="col-lg-5">
          <div class="panel-group collection-sidemenu mt-5" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading active" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Gemstone Collection <i class="fas fa-chevron-right"></i>
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body clearfix">
                <a href="#" class="list"><i class="fas fa-chevron-right"></i>AMETHYST</a>
                <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLUE AGATE</a>
                <a href="#" class="list"><i class="fas fa-chevron-right"></i>White QUARTZ</a>
                <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLACK PETRIFIED WOODSTONE</a>
                <a href="#" class="list"><i class="fas fa-chevron-right"></i>Smoky QUARTZ</a>
                <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLUE TIGERS EYE</a>
                <a href="#" class="list"><i class="fas fa-chevron-right"></i>Rose QUARTZ</a>

                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Natural Stone Collection <i class="fas fa-chevron-right"></i>
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body clearfix">
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>AMETHYST</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLUE AGATE</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>White QUARTZ</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLACK PETRIFIED WOODSTONE</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>Smoky QUARTZ</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLUE TIGERS EYE</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>Rose QUARTZ</a>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                    Mashrabia Collection <i class="fas fa-chevron-right"></i>
                  </a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body clearfix">
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>AMETHYST</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLUE AGATE</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>White QUARTZ</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLACK PETRIFIED WOODSTONE</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>Smoky QUARTZ</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLUE TIGERS EYE</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>Rose QUARTZ</a>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Mashrabia Collection <i class="fas fa-chevron-right"></i>
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body clearfix">
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>AMETHYST</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLUE AGATE</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>White QUARTZ</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLACK PETRIFIED WOODSTONE</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>Smoky QUARTZ</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>BLUE TIGERS EYE</a>
                  <a href="#" class="list"><i class="fas fa-chevron-right"></i>Rose QUARTZ</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 text-center">
            <img src="{{ asset('css/project/images/product-front-view.png') }}" alt="">
        </div>
    </div>

  </div>
</section>
    
@endsection