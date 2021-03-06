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

    <h2 class="collection-title">Collections</h2>


    <div class="row">
        <div class="col-lg-5">
          <div class="panel-group collection-sidemenu mt-5" id="accordion" role="tablist" aria-multiselectable="true">

            <?php 
            $i=0;
            $imgData = [];
            foreach($collectiodatas as $collectiodata)
            {

              $activeClass = '';
              $showClass = '';
              $inClass='';
              $ariaexpanded = 'false';
              $collapsed = 'collapsed';

              if($i == 0)
              {
                $activeClass = 'active';
                $showClass = 'show';
                $inClass = 'in';
                $ariaexpanded = 'true';
                $collapsed = '';

              }
              echo '<div class="panel panel-default">';
                echo '<div class="panel-heading '.$activeClass.'" role="tab" id="heading'.$collectiodata->id.'">';
                  echo '<h4 class="panel-title">';
                    echo '<a class="'.$collapsed.'" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$collectiodata->id.'" aria-expanded="'.$ariaexpanded.'" aria-controls="collapse'.$collectiodata->id.'">
                      '.$collectiodata->title.' <i class="fas fa-chevron-right"></i>
                    </a>';
                  echo '</h4>';
                echo '</div>';
                echo '<div id="collapse'.$collectiodata->id.'" class="panel-collapse in collapse '.$showClass.'" role="tabpanel" aria-labelledby="heading'.$collectiodata->id.'">';
                  echo '<div class="panel-body clearfix">';

                    


                    if($collectiodata->product->count() > 0 )
                    {
                      $products = $collectiodata->product;
                      $l=0;					  
					  
                      foreach($products as $product)
                      { 
            					  	if($l < 5)
            						{
                                   	 echo '<a target="_blank" href="'.route('frontend.get-child-collections', ['id' => $collectiodata->slug_id,'sub' => $product->slug_id]).'" class="list"><i class="fas fa-chevron-right"></i>'.$product->title.'</a>';
            						}
            						$l++;
                                  }
            					  if(count($products) > 5)
            					  {
            					  echo '<a target="_blank" href="'.route('frontend.get-collections', ['id' => $collectiodata->slug_id]).'" class="list"><i class="fas fa-chevron-right"></i>More..</a>';
            					  }

                      }
                      else
                      {
                      $products = $collectiodata->subcollection;

                      $j=0;
                      
                      foreach($products as $product)
                      { 
                        if($j==5)
                        {

                         break;

                        }
                        echo '<a class="list collection-list" rel="'.$product->id.'" href="JavaScript:void(0);" class="list"><i class="fas fa-chevron-right"></i>'.$product->title.'</a>';

                        $imgData[] = ['id'=>$product->id,'image'=>$product->image1];
                        $j++;
                      }

                      if(count($products) > 5)
					  {
					  echo '<a target="_blank" href="'.route('frontend.stone-collections', ['id' => $collectiodata->slug_id,'sub' => 'all']).'" class="list"><i class="fas fa-chevron-right"></i>More..</a>';
					  }
                    }


                  echo '</div>';
                echo '</div>';
              echo '</div>';

              $i++;
              } 

              ?>
            




            
            
          </div>
        </div>
        <div class="col-lg-7 text-center">
            <img id='ImgCollection' src="{{ asset('css/project/images/product-front-view.png') }}" alt="Collections">
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


     for (var i = 0; i < data.length; i++){
      // look for the entry with a matching `code` value
      if (data[i].id == getId){

        getImg = data[i].image;
         // we found it
        // obj[i].name is the matched result
      }
    }

     //alert(getImg); //// It will show the id of the clicked link
 
     //// Here you have to get img path according to ID

      if(getImg !="")
      {
              $("#ImgCollection").attr("src", path+'/'+getImg);
       }

});


setTimeout(function(){
  var elements = document.getElementsByClassName('collection-list');

        $(elements[0]).click();


    },1);

 });

</script>
    
@endsection


