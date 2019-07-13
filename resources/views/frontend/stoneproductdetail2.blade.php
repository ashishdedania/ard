@extends('frontend.layouts.app')

@section('content')


@php
if(count($images) > 0)
{
	$imgAlt = $colection->image_alt_text;
	$imgTitle = $colection->image_title_text;
    
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
         $counter = ["","-one","-two","-three","-four"];
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
          echo '<img class="d-block w-100" src="'.URL::to('/').'/images/'.$image.'"   alt="'. $imgAlt.$counter[$i].'"  title="'. $imgTitle.'">';
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
            <div class="carousel-item active"> <img class="d-block w-100" src="{{ URL::to('/') }}/images/{{$images[0]}}" alt="{{ $imgAlt}}" title="{{ $imgTitle}}"> </div> 
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
              echo '<option value='.$subcolection->id.'>'.$subcolection->title.'</option>';

              $myimg = 'no-image.jpg';
              if (!empty($subcolection->image4)) {

                 $myimg = $subcolection->image4;
               }

               $desc = str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$subcolection->description);
               $rt = route('frontend.get-child-collections', ['id'=>$colection->slug_id,'sub' => $subcolection->slug_id]);

              $imgData[] = ['id'=>$subcolection->id,'image'=>$myimg,'title'=>$subcolection->title,'desc'=>$desc,'src'=>$rt, 'altText'=>$subcolection->image_alt_text, 'titleText'=>$subcolection->image_title_text];
            }
            ?>
        
          </select>




          <div class="product-listing-nav">
            <ul>
              <?php 
            $i=0;
            foreach($subcolections as $subcolection)
            {
              echo '<li class="collection-list" rel="'.$subcolection->id.'" ><a href="JavaScript:void(0);"><i class="fas fa-chevron-right"></i>'.$subcolection->title.'</a></li>';

              $myimg = 'no-image.jpg';
              if (!empty($subcolection->image4)) {

                 $myimg = $subcolection->image4;
               }

               $desc = str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$subcolection->description);
               $rt = route('frontend.get-child-collections', ['id'=>$colection->slug_id,'sub' => $subcolection->slug_id]);

              $imgData[] = ['id'=>$subcolection->id,'image'=>$myimg,'title'=>$subcolection->title,'desc'=>$desc,'src'=>$rt];
            }
            ?>

              

            </ul>
          </div>
        </div>
        <div class="col-lg-7 text-center collection-img">
          <div class="mt-5">

            <?php

              $img = URL::to('/').'/css/project/images/no-image.jpg';
              if (!empty($selected->image4)) {

                 $img = URL::to('/').'/images/'.$selected->image4;
               }
            ?>

            <a id="Imghref" target="_blank" href="{{route('frontend.get-child-collections', ['id'=>$colection->slug_id,'sub' => $selected->slug_id])}}"><img id='ImgCollection' src="{{$img}}" alt="{{$selected->image_alt_text}}" title="{{$selected->image_title_text}}"></a>
            <div class="product-caption mt-4">
              <h6 id='ImgTitle'><?php if($selected) {echo $selected->title;} ?></h6>
              <p class="mt-3" id='ImgDesc'><?php if($selected) {echo str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$selected->description);} ?></p>
            </div>
          </div>

        </div>
    </div>

  </div>
</section>


<script type="text/javascript">
$(document).ready(function () {  
$(".collection-list").click(function(){
     var getId = $(this).attr("rel");
     var data = <?php echo json_encode($imgData) ?>;
     var path = "<?php echo asset('images/') ?>";

     
     var getImg = "";
     var getTitle = "";
     var getDesc = "";
     var getHref = "";


     for (var i = 0; i < data.length; i++){
      // look for the entry with a matching `code` value
      if (data[i].id == getId){

        getImg = data[i].image;
        getTitle = data[i].title;
        getDesc = data[i].desc;
        getHref = data[i].src
		getAlt = data[i].altText?data[i].altText:getTitle;
		getTitleText = data[i].titleText?data[i].titleText:getTitle; // Image Title Tag text
         
      }
    }

     
      if(getImg !="")
      {
              $("#ImgCollection").attr("src", path+'/'+getImg);
			  $("#ImgCollection").attr("alt", getAlt);
			  $("#ImgCollection").attr("title", getTitleText);
              $("#ImgTitle").html(getTitle);
              $("#ImgDesc").html(getDesc);
              $("#Imghref").attr("href", getHref);
       }

});


$('#myselect').on('change', function() {
  

  var getId = this.value;
     var data = <?php echo json_encode($imgData) ?>;
     var path = "<?php echo asset('images/') ?>";

     
     var getImg = "";
     var getTitle = "";
     var getDesc = "";
     var getHref = "";


     for (var i = 0; i < data.length; i++){
      // look for the entry with a matching `code` value
      if (data[i].id == getId){

        getImg = data[i].image;
        getTitle = data[i].title;
        getDesc = data[i].desc;
        getHref = data[i].src
         
      }
    }

     
      if(getImg !="")
      {
              $("#ImgCollection").attr("src", path+'/'+getImg);
              $("#ImgTitle").html(getTitle);
              $("#ImgDesc").html(getDesc);
              $("#Imghref").attr("href", getHref);
       }
});


setTimeout(function(){
  var elements = document.getElementsByClassName('collection-list');

        $(elements[0]).click();


    },1);

 });

</script>
    
@endsection

