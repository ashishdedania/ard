@extends('frontend.layouts.app')

@section('content')

	
	
    {!! str_replace( '#WEBSITE_URL#',env('WEBSITE_URL'),$page->description) !!}     
                 
@endsection