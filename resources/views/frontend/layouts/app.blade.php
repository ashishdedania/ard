@php
    use Illuminate\Support\Facades\Route;
@endphp
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
    
    	 @yield('meta')
        <meta charset="utf-8">
        @include('frontend.includes.meta-setting')
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        


        
        <link rel="stylesheet" href="{{ URL::asset('css/project/css/bootstrap.css') }}" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/project/css/all.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/project/css/style.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/project/css/responsive.css') }}" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/project/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/project/js/main.js') }}"></script>
     

       

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
       
        @yield('after-styles')

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
	       ]);?>
        </script>
        @include('frontend.includes.header-setting')
    </head>
    <body id="page-top">
        @include('frontend.includes.header')
   
                
                @yield('content')
            
        @include('frontend.includes.footer')

        <div id='app'></div>


        <!-- Scripts -->
        <!-- @yield('before-scripts')
        {!! Html::script(mix('js/frontend.js')) !!}
        @yield('after-scripts')
        
        {{ Html::script('js/frontend/frontend.js') }}
        {!! Html::script('js/select2/select2.js') !!} -->



        


        @include('frontend.includes.body-setting')
    </body>
</html>