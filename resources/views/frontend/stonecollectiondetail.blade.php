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
      <img class="d-block w-100" src="{{ URL::to('/') }}/images/{{$colection->image1}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ URL::to('/') }}/images/{{$colection->image2}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ URL::to('/') }}/images/{{$colection->image3}}" alt="Third slide">
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
    <div class="collection-title">Collections</div>
    <div class="inner-title">
        <h2>{{$colection->title}}</h2>
    </div>


    <div class="row">
        <div class="col-lg-5">

          <select class="form-control product-listing-nav-mobile" id="myselect">

            <?php 
            $i=0;
            foreach($subcolections as $subcolection)
            {
              echo '<option value='.route('frontend.stone-collection-detail', ['id' => $colection->id,'sub' => $subcolection->id]).'>'.$subcolection->title.'</option>';
            }
            ?>
        
          </select>




          <div class="product-listing-nav">
            <ul>
              <?php 
            $i=0;
            foreach($subcolections as $subcolection)
            {
              echo '<li><a href="'.route('frontend.stone-collection-detail', ['id' => $colection->id,'sub' => $subcolection->id]).'"><i class="fas fa-chevron-right"></i>'.$subcolection->title.'</a></li>';
            }
            ?>

              

            </ul>
          </div>
        </div>
        <div class="col-lg-7 text-center">
          <div class="mt-5">
            <img src="{{ URL::to('/') }}/images/{{$selected->image1}}" alt="">
            <div class="product-caption mt-4">
              <h6><?php if($selected) {echo $selected->title;} ?></h6>
              <p class="mt-3"><?php if($selected) {echo $selected->description;} ?></p>
            </div>
          </div>

        </div>
    </div>

  </div>
</section>


<script type="text/javascript">
$(document).ready(function () {  


$('#myselect').on('change', function() {
  window.location.replace(this.value);
});




 });

</script> 
    
@endsection

