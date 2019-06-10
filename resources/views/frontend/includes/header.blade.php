<!-- Navigation -->

  <?php

        $indoorid  = 0;
        $outdoorid = 0;
        $productid = 0;

        $indoor = DB::table('indoor_outdoor')->where('is_indoor', 1)->orderBy('id')->first();
        
        if($indoor)
        {
            $indoorid = $indoor->id;
        }


        $outdoor = DB::table('indoor_outdoor')->where('is_indoor', 0)->orderBy('id')->first(); 
        
        if($outdoor)
        {
            $outdoorid = $outdoor->id;
        }


        $product = DB::table('stone_product')->orderBy('id')->first(); 
        
        if($outdoor)
        {
            $productid = $product->id;
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
              Application
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('frontend.indoor', ['id'=>$indoorid])}}">Indoor Application</a>
              <a class="dropdown-item" href="{{route('frontend.outdoor', ['id'=>$outdoorid])}}">Outdoor Application</a>          
            </div>
          </li>
          <li class="nav-item {{ (\Request::route()->getName() == 'frontend.stone-collection') ? 'active' : '' }}">
            <a class="nav-link js-scroll-trigger" href="{{route('frontend.stone-collection')}}">Collection</a>
          </li>
          <li class="nav-item {{ (\Request::route()->getName() == 'frontend.production') ? 'active' : '' }}">
            <a class="nav-link js-scroll-trigger" href="{{route('frontend.production', ['id'=>$productid])}}">Production</a>
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

  