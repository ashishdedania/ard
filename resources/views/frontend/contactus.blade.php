@extends('frontend.layouts.app')

@section('content')

<section class="about-seaction">
  <div class="container">
        



        {!! $html !!}  


        


        <div class="row contactus-form">
          <div class="col-md-6">
            <input type="text" class="form-control mb-3" placeholder="Name">
            <input type="text" class="form-control mb-3" placeholder="Contact Number">
            <input type="text" class="form-control mb-3" placeholder="Email Id">
          </div>
          <div class="col-md-6">
            <textarea class="form-control" placeholder="Message mb-3"></textarea>
          </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
              <button class="btn send-btn btn-secondary float-right">SEND</button>
            </div>
        </div>

  </div>
<section>
    
@endsection