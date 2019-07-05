@extends('frontend.layouts.app')

@section('content')


@php
if(count($images) > 0)
{
  if(count($images) > 1)
  {
    @endphp


    <section class="collection-slider">
      <div id="carouselExampleIndicators" class="carousel slide home-slider-section" data-ride="carousel">
      <ol class="carousel-indicators">

        @php
        $i=0;
        foreach($images as $image)
        {

          if($i == 0)
          {
            $active = 'active';
          }
          else
          {
            $active = '';

          }

          echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="'.$active.'"></li>';

          $i=$i+1;
        }
        @endphp
        
      </ol>
      <div class="carousel-inner">

        @php
        $i=0;
        foreach($images as $image)
        {

          if($i == 0)
          {
            $active = 'active';
          }
          else
          {
            $active = '';

          }

          echo '<div class="carousel-item '.$active.'">';
          echo '<img class="d-block w-100" src="'.URL::to('/').'/images/'.$image.'" alt="slide'.$i.'">';
          echo '</div>';

          $i=$i+1;
        }
        @endphp
     

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


    @php

  }

  if(count($images) == 1)
  {
    @endphp
      <section class="collection-slider">
        <div id="carouselExampleIndicators" class="carousel home-slider-section">
          <div class="carousel-inner">
            <div class="carousel-item active"> <img class="d-block w-100" src="{{ URL::to('/') }}/images/{{$images[0]}}" alt="First slide"> </div>     
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
      </section>

    @php
  }


}

@endphp





<section class="collection-seaction">
  <div class="container">
    <!-- <div class="collection-title">Collections</div> -->
    <p>{{str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$colection->description)}}</p>
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
              echo '<option value='.route('frontend.stone-collections', ['id' => $colection->slug_id,'sub' => $subcolection->slug_id]).'>'.$subcolection->title.'</option>';
            }
            ?>
        
          </select>




          <div class="product-listing-nav">
            <ul>
              <?php 
            $i=0;
            foreach($subcolections as $subcolection)
            {
              echo '<li><a href="'.route('frontend.stone-collections', ['id' => $colection->slug_id,'sub' => $subcolection->slug_id]).'"><i class="fas fa-chevron-right"></i>'.$subcolection->title.'</a></li>';
            }
            ?>

              

            </ul>
          </div>
        </div>
        <div class="col-lg-7 text-center collection-img">
          <div class="mt-5">


            <?php

              $img = URL::to('/').'/css/project/images/no-image.jpg';
              if (!empty($selected->image1)) {
                 $img = URL::to('/').'/images/'.$selected->image1;
               }
			   
			   $imgAlt = $selected->image_alt_text;
			   $imgTitle = $selected->image_title_text;
            ?>

            <img id='ImgCollection' src="{{ $img}}" alt="{{ $imgAlt?$imgAlt:$selected->title}}" title="{{ $imgTitle?$imgTitle:$selected->title}}">
            <div class="product-caption mt-4">
              <h6 id='ImgTitle'><?php if($selected) {echo $selected->title;} ?></h6>
              <p id='ImgDesc' class="mt-3"><?php if($selected) {echo str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$selected->description);} ?></p>
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

