<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{URL::to('/')}}">
        <img src="{{ asset('css/project/images/logo.png') }}" alt=""></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item active">
            <a class="nav-link js-scroll-trigger" href="{{URL::to('/')}}">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link js-scroll-trigger" href="{{route('frontend.pages.show', ['slug' => 'about-us'])}}">About Us </a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{route('frontend.stone-collection')}}">Collection</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{route('frontend.pages.show', ['slug' => 'production'])}}">Production</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{route('frontend.pages.show', ['slug' => 'stone-talk'])}}">Stone Talk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{route('frontend.contact-us')}}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>