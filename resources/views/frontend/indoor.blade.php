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
      <img class="d-block w-100" src="{{ URL::to('/') }}/images/{{$images->image1}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ URL::to('/') }}/images/{{$images->image2}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ URL::to('/') }}/images/{{$images->image3}}" alt="Third slide">
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
<section class="application-seaction">
  <div class="container">

      <select class="form-control category-type-menu-mobile" id="myselect">
        @foreach($indoors as $indoor)

        @php
            $selected = '';
            $url = route('frontend.indoor', ['id'=>$indoor->id]);

            if($id == $indoor->id)
            {
              $selected = 'selected';

            }

          @endphp

        <option value="{{$url}}" {{$selected}}>{{$indoor->title}}</option>

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

      <ul class="category-type-menu mt-5 mb-5">

        @foreach($indoors as $indoor)
          @php
            $class = '';
            $url = route('frontend.indoor', ['id'=>$indoor->id]);

            if($id == $indoor->id)
            {
              $class = 'active';

            }

          @endphp
          <li class={{$class}}><a href={{$url}}>{{$indoor->title}}</a></li>
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

      {{$indoor->description}}

    <div class="masonry">
      
        <div class="row">

        @php
          
        if(isset($item->items)) { 


         $i=1; 

        @endphp
          
        @foreach($item->items as $indoorItem)

         <div class="col">
          <a href="#exampleModal{{$indoorItem->id}}" data-toggle="modal"><img src="{{ URL::to('/') }}/images/{{$indoorItem->image1}}"  alt=""></a>
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

 




@foreach($item->items as $indoorItem)

  <div class="modal fade" id="exampleModal{{$indoorItem->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal{{$indoorItem->id}}Label" aria-hidden="true">
  <div class="modal-dialog collection-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{ URL::to('/') }}/images/close.png" alt="">
      </button>
      <div class="modal-body">

          <div class="left-img">
          <img src="{{ URL::to('/') }}/images/{{$indoorItem->image1}}" class="w-100" alt="">
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




<script type="text/javascript">
$(document).ready(function () {  


$('#myselect').on('change', function() {
  window.location.replace(this.value);
});




 });

</script> 

    
@endsection

