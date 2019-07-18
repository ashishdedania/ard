@extends('frontend.layouts.app')

@section('content')
<style>
        .modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('{{ URL::to('/') }}/images/loading-circle.gif') 
                50% 50% 
                no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.loading {
    overflow: hidden;   
}

/* Anytime the body has the loading class, our
   modal element will be visible */
body.loading .modal {
    display: block;
}
    </style>
<section class="about-seaction">
<div class="container"> {!! $html !!}
  <div class="row contactus-form">
    <div class="col-md-6">
      <input type="text" class="form-control mb-3" placeholder="Name" id='mail-name'>
      <input type="text" class="form-control mb-3" placeholder="Contact Number" id='mail-number' maxlength="10" onkeypress="return isNumber(event)">
      <input type="text" class="form-control mb-3" placeholder="Email Id" id='mail-email'>
    </div>
    <div class="col-md-6">
      <textarea class="form-control" placeholder="Let Us Know How We Can Help" id='mail-message'></textarea>
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-md-12">
      <button class="btn send-btn btn-secondary float-right" id='send-btn'>SEND</button>
    </div>
  </div>
</div>
<div class="modal"></div>
<section>
<script type="text/javascript">
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
   // alert("You have entered an invalid email address!")
    return (false)
}

$(document).ready(function () {  
$("#send-btn").click(function(){
     var name = document.getElementById('mail-name').value;
     var number = document.getElementById('mail-number').value;
     var email = document.getElementById('mail-email').value;
     var message = document.getElementById('mail-message').value;
var body = $("body");
     if(name.trim() == '')
     {
      alert('Please enter Name');
      return false;
     }

     if(number.trim() == '' || number.length < 10)
     {
      alert('Please provide valide Contact Number!');
      return false;
     }

     if(email.trim() == '' || !(ValidateEmail(email)))
     {
      alert('Please provide Email Address!');
      return false;
     }

     if(message.trim() == '')
     {
      alert('Please provide valid Message!');
	  message.value="";
	  message.focus();
      return false;
     }
     
     var urlis = "{{route('frontend.sendcontact')}}"; body.addClass("loading");

     $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });

     $.ajax({
      url: urlis,
      type: 'POST',  // http method
      data: {name : name,number : number,email : email,message : message},
      success: function(html){
        alert('Your request has been submitted. Our Representative will contact you shortly.');

        document.getElementById('mail-name').value ='';
      document.getElementById('mail-number').value='';
     document.getElementById('mail-email').value='';
     document.getElementById('mail-message').value='';
     body.removeClass("loading");
      }
    });
     
});
});




</script>
@endsection 