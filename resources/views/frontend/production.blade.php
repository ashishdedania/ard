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



<?php
if(!empty($product->product_carousel_area))
{
  echo '<section class="product-carousel">';
  echo $product->product_carousel_area;
  echo '</section>';
}
?>


<?php
if(!empty($product->versitility_of_application))
{
  echo '<section class="">';
  echo $product->versitility_of_application;
  echo '</section>';
}
?>



<?php
if(!empty($product->technical_info_section))
{
  echo '<section class="technical-info-section">';
  echo $product->technical_info_section;
  echo '</section>';
}
?>


<?php
if(!empty($product->quote_selection))
{
  echo '<section class="quote-seaction">';
  echo $product->quote_selection;
  echo '</section>';
}

?>


<?php
if(!empty($product->edging_option))
{
  echo '<section class="edging-options-section">';
  echo $product->edging_option;
  echo '</section>';
}
?>

<?php
if(!empty($product->maintainance_section))
{
  echo '<section class="maintenance-section">';
  echo $product->maintainance_section;
  echo '</section>';
}
?>


<?php
if(!empty($product->section_seven))
{
  echo '<section class="section-seven">';
  echo $product->section_seven;
  echo '</section>';
}

?>




@endsection
