@extends('frontend.layouts.app')

@section('content')

@php
if(count($images) > 0)
{
	$imgAlt = $product->image_alt_text;
	$imgTitle = $product->image_title_text;
    $counter = ["","-one","-two","-three","-four"];
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
          echo '<img class="d-block w-100" src="'.URL::to('/').'/images/'.$image.'" alt="'. $imgAlt.$counter[$i].'"  title="'. $imgTitle.'">';
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
            <div class="carousel-item active"> <img class="d-block w-100" src="{{ URL::to('/') }}/images/{{$images[0]}}" alt="{{ $imgAlt}}" title="{{ $imgTitle}}"></div>     
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
  echo str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$product->product_carousel_area);
  echo '</section>';
}
?>


<?php
if(!empty($product->versitility_of_application))
{
  echo '<section class="">';
  echo str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$product->versitility_of_application);
  echo '</section>';
}
?>



<?php
if(!empty($product->technical_info_section))
{
  echo '<section class="technical-info-section">';
  echo str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$product->technical_info_section);
  echo '</section>';
}
?>


<?php
if(!empty($product->quote_selection))
{
  echo '<section class="quote-seaction">';
  echo str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$product->quote_selection);
  echo '</section>';
}

?>


<?php
if(!empty($product->edging_option))
{
  echo '<section class="edging-options-section">';
  echo str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$product->edging_option);
  echo '</section>';
}
?>

<?php
if(!empty($product->maintainance_section))
{
  echo '<section class="maintenance-section">';
  echo str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$product->maintainance_section);
  echo '</section>';
}
?>


<?php
if(!empty($product->section_seven))
{
  echo '<section class="section-seven">';
  echo str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$product->section_seven);
  echo '</section>';
}

?>




@endsection
