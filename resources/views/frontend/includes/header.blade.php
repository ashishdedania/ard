<!-- Navigation -->

  <?php

        $productid = 0;

        


        


        $collections = DB::table('stone_collection')->orderBy('id')->get(); 
        $collectionid = 0;

        foreach($collections as $collection)
        {

          $product = DB::table('stone_product')->where('collection_id', $collection->id)->first(); 
          if($product)
          {
              $collectionid = $collection->id;
          }

        }

        
       

  ?>


  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{URL::to('/')}}">
        <img src="{{ asset('css/project/images/logo.png') }}" alt=""></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0"> 
          <li class="nav-item {{ (\Request::route()->getName() == 'frontend.index') ? 'active' : '' }}">
            <a class="nav-link js-scroll-trigger" href="{{URL::to('/')}}">Home</a>
          </li>
          <li class="nav-item {{ (\Request::route()->getName() == 'frontend.pages.show') ? 'active' : '' }}">
            <a class="nav-link js-scroll-trigger" href="{{route('frontend.pages.show', ['slug' => 'about-us'])}}">About Us </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Applications
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('frontend.indoor-applications')}}">Indoor Application</a>
              <a class="dropdown-item" href="{{route('frontend.outdoor-applications')}}">Outdoor Application</a>          
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Collections
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @php

                foreach($collections as $collection)
                {

                  $product = DB::table('stone_product')->where('collection_id', $collection->id)->first(); 
                  if($product)
                  {

                    @endphp

                      <a class="dropdown-item" href="{{route('frontend.gemstone-collections-all', ['id'=>$collection->slug_id,'sub'=>'all'])}}">{{$collection->title}}</a>



                    @php  
                  }


                  $subcollection = DB::table('sub_stone_collection')->where('collection_id', $collection->id)->first(); 
                  if($subcollection)
                  {
                    @endphp
                      <a class="dropdown-item" href="{{route('frontend.stone-collections', ['id'=>$collection->slug_id,'sub'=>'all'])}}">{{$collection->title}}</a>
                    @php
                  }

                  

                }


              @endphp 
              <a class="dropdown-item" href="{{route('frontend.collections')}}">View All</a>       
            </div>
          </li>

          
          
          <li class="nav-item {{ (\Request::route()->getName() == 'frontend.stone-talk') ? 'active' : '' }}">
            <a class="nav-link js-scroll-trigger" href="{{route('frontend.stone-talk')}}">Stone Talk</a>
          </li>
          <li class="nav-item {{ (\Request::route()->getName() == 'frontend.contact-us') ? 'active' : '' }}">
            <a class="nav-link js-scroll-trigger" href="{{route('frontend.contact-us')}}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  