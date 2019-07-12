@extends('frontend.layouts.app')

@section('content')


@php
if(count($images) > 0)
{
	$imgAlt = $data->image_alt_text;
	$imgTitle = $data->image_title_text;
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
          echo '<img class="d-block w-100" src="'.URL::to('/').'/images/'.$image.'"  alt="'. $imgAlt.' - '.($i + 1).'"  title="'. $imgAlt.' - '.($i + 1).'">';
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






<section class="application-seaction">
  <div class="container">

      <select class="form-control category-type-menu-mobile" id="myselect">
        @foreach($indoors as $indoor)

        @php
            

          @endphp

        <option value="{{$indoor->id}}">{{$indoor->title}}</option>

        @endforeach

        <!-- <option>Stone staircases</option>
        <option>Stone Balusters</option>
        <option>Counter Tops</option>
        <option>Coffee Tables</option>
        <option>Office Tabless</option>
        <option>Stone Lattice Screens</option>
        <option>Interior Floorings</option>
        <option>Stone Balusters</option>
        <option>Interior Walls</option>
        <option>Interior Artifacts</option>
        <option>Knobs and Handles</option> -->
      </select>

      <ul class="category-type-menu mt-5 mb-5" id="my-ul">

        @foreach($indoors as $indoor)
          @php
            $class = 'my-class';
            

            if($id == $indoor->id)
            {
              $class = 'my-class active';

            }

          @endphp
          <li class="{{$class}}" data-id={{$indoor->id}}><a href='javascript:void(0);'>{{$indoor->title}}</a></li>
        @endforeach

        <!-- <li><a href="#">Stone staircases</a></li>
        <li><a href="#">Stone Balusters</a></li>
        <li><a href="#">Counter Tops</a></li>
        <li><a href="#">Coffee Tables</a></li>
        <li class="active"><a href="#">Office Tables</a></li>
        <li><a href="#">Stone Lattice Screens</a></li>
        <li><a href="#">Interior Floorings</a></li>
        <li><a href="#">Interior Walls</a></li>
        <li><a href="#">Interior Artifacts</a></li>
        <li><a href="#">Knobs and Handles</a></li> -->
      </ul>

  </div>

    <div class="border-single"></div>


  <div class="container">

      <p id="data-description">{{$item->description}} </p>

    <div class="masonry" id="data-masonry">
      
        <div class="row">

        @php
          
        if(isset($item->items)) { 


         $i=1; 

        @endphp


          
        @foreach($item->items as $indoorItem)
			@php $imgAlt = $indoorItem->image_title_text?$indoorItem->image_title_text:$indoorItem->title; @endphp
            @php $imgTitle = $indoorItem->image_title_text?$indoorItem->image_title_text:$indoorItem->title; @endphp
         <div class="col">
          <a href="#outdoorModal{{$indoorItem->id}}" data-toggle="modal"><img src="{{ URL::to('/') }}/images/{{$indoorItem->image1}}" alt="{{$imgAlt}}" title="{{$imgTitle}}"></a>
        </div> 

        @php 
          if($i % 3 == 0)
          { 
        @endphp
          </div>
            <div class="row">

        @php
          }
          $i = $i +1; 
        @endphp

        @endforeach

        @php } @endphp

        </div>
       
    </div>

</div>


</section>

 

<div id="data-ty">
@foreach($item->items as $indoorItem)
	@php $imgAlt = $indoorItem->image_title_text?$indoorItem->image_title_text:$indoorItem->title; @endphp
    @php $imgTitle = $indoorItem->image_title_text?$indoorItem->image_title_text:$indoorItem->title; @endphp
  <div class="modal fade" id="outdoorModal{{$indoorItem->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal{{$indoorItem->id}}Label" aria-hidden="true">
  <div class="modal-dialog collection-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{ URL::to('/') }}/images/close.png" alt="">
      </button>
      <div class="modal-body">

          <div class="left-img">
          <img src="{{ URL::to('/') }}/images/{{$indoorItem->image1}}" class="w-100"  alt="{{$imgAlt}}" title="{{$imgTitle}}">
          </div>
          <div class="info-block">
            <h2>{{$indoorItem->title}}</h2>
            <p>{{$indoorItem->description}}
</p>
          </div>

      </div>

    </div>
  </div>
</div>

 @endforeach
</div>



<script type="text/javascript">
$(document).ready(function () {  


$('#myselect').on('change', function() {


  var id = this.value;
     
     var body = $("body");
     var urlis = "{{route('frontend.getajax')}}"; body.addClass("loading");

     $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });

     $.ajax({
      url: urlis,
      type: 'GET',  // http method
      data: {id : id},
      success: function(html){

        var data = JSON.parse(html);
        document.getElementById('data-description').innerHTML = data.description;
        document.getElementById('data-masonry').innerHTML = data.masonry;
        document.getElementById('data-ty').innerHTML = data.model;

        
     body.removeClass("loading");
      }
    });
  
});





$("#my-ul li").click(function(){
     var id = $(this).data("id");
     
     var body = $("body");
     var urlis = "{{route('frontend.getajax')}}"; body.addClass("loading");

     $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });

     $.ajax({
      url: urlis,
      type: 'GET',  // http method
      data: {id : id},
      success: function(html){

        var data = JSON.parse(html);
        document.getElementById('data-description').innerHTML = data.description;
        document.getElementById('data-masonry').innerHTML = data.masonry;
        document.getElementById('data-ty').innerHTML = data.model;

        
     body.removeClass("loading");


      }
    });
	
	$("#my-ul li").removeClass('active');
     $(this).addClass('active');

    });


 });

</script> 

    
@endsection

