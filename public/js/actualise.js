var Actulise = {}; // common variable used in all the files of the backend
(function () {
  jQuery(".select2").select2();
  //toastr options
  toastr.options = {
     "progressBar": true,
     "hideMethod": "slideUp",
     "closeDuration" : 200,
     "showEasing" : "swing",
  }
	Actulise = {
		/**
		 * Client js
		 */
		 Client: {
		 	 init: function () {
                this.findAge();
                this.clientProfile();
            },
            clientProfile: function (e) {
                jQuery('#li-profile').click(function(e){
                  jQuery('#edit').hide();
                  jQuery('#profile').show();
                });
                jQuery('#li-edit').click(function(e){
                  jQuery('#profile').hide();
                  jQuery('#edit').show();
                });
            },
            ageCalculation : function (e) {
                  var bday=document.getElementById('datetimepicker1').value;
                  if (bday == "") {
                  document.getElementById('age').value='';
                } else{
                var from = bday.split("-");
                var today = new Date();
                var birthDate = new Date(from[2], from[1], from[0]);
                var age = today.getFullYear() - birthDate.getFullYear();
                if (today.getMonth() < birthDate.getMonth() || (today.getMonth() == birthDate.getMonth() && today.getDate() < birthDate.getDate())) {
                    age--;
                    document.getElementById('age').value=age + 1 ;
                } else{
                   age--;
                  document.getElementById('age').value=age + 1;
                }

              }
            },
          findAge : function () {
          	 var bday=document.getElementById('datetimepicker1').value;
              var today = new Date();
              var birthDate = new Date(bday);
              var age = today.getFullYear() - birthDate.getFullYear();
              var m = today.getMonth() - birthDate.getMonth();
              if (today.getMonth() < birthDate.getMonth() || (today.getMonth() == birthDate.getMonth() && today.getDate() < birthDate.getDate())) {
                  age--;
              }
              document.getElementById('age').value=age;
          },
		 },
	};

})();

//check numeric validaion
 $(document).on('keypup', '.check-no', function () {
        var $this = $(this);
        var length = this.value.length;
        $this.val($this.val().replace(/[^\d.]/g, ''));
        if (length == '11') {
            return this.value= '';
        }
    });
 //check maximumnumber
     $(document).on('keyup', '.max-val', function () {
        var value = $(this).val();
        var max = 10;
        if (value > max) {
            $(this).val('');
        } else {
            return value;
        }
    });
 //check only numeric non decimal
$(document).on('keyup', '.check_only_number', function () {
        var $this = $(this);
        var length = this.value.length;
        $this.val($this.val().replace(/\D/, ''));
        if (length == '3') {
            return this.value= '';
        }
    });
 //check alpha numeric 
 $(document).on('keyup', '.check_alpha_numeric', function () {
        var $this = $(this);
        var length = this.value.length;
        
        $this.val($this.val().replace(/[\W_]+/g," "));
        $this.val($this.val().toUpperCase());

       
    });

    // feedback swal func
    $('body').on('click', 'a[name=alert_feedback]', function (e) {
      //alert("here");
        e.preventDefault();
        var link = $(this);
        var title = link.attr('data-trans-title') ? link.attr('data-trans-title') : "This service is currently ongoing, so this option is not enabled yet.";
        var cancel = link.attr('data-trans-button-cancel') ? link.attr('data-trans-button-cancel') : "Ok";

        swal({
            title: title,
            type: "info",
            //showCancelButton: true,
            cancelButtonText: cancel
        });
    });
//common ajax call.
var AJAX = {
    sendRequest: function(requestURL, requestMethod, data, handleSuccessFunction, handleErrorFunction = false) {
        $.ajax({
            url: requestURL,
            type: requestMethod,
            data: data,
            async: true,
            success: function(response) {
                handleSuccessFunction(response);
            },
            error: function(xhr, textStatus, errorThrown) {
                AJAX.handleGenericErrorResponse(xhr, textStatus, errorThrown);
            }
        });
    },
    handleGenericErrorResponse: function(XMLHttpRequest, textStatus, errorThrown) {
        // Laravel validation status code is 422
        if (XMLHttpRequest.status == 422) {
            var message = '',
                errors = XMLHttpRequest.responseJSON;
            $.each(errors, function(key, value) {
                message += value[0] + '<br>';
            });
            AJAX.showErrorMessage(message);
        }
    },
    showErrorMessage: function(errorMessage) {
        $('.alert').removeClass('hidden');
        $('.alert').html(errorMessage);
        window.scrollTo(0, 0);
        setTimeout(function() {
            $('.alert').html('');
            $('.alert').addClass('hidden');
        }, 2000);
    }
}
