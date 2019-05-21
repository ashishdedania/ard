<?php
/**
 * Testimonial
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Testimonial'], function () 
    {
        Route::resource('testimonials', 'TestimonialsController');

        Route::any('testimonial/add/commnet/{intervention_type_id}', 'TestimonialsController@addComment')->name('testimonial.add.testimonial');

        Route::any('testimonial/storeTestimonial/{intervention_type_id}', 'TestimonialsController@storeTestimonial')->name('store.testimonial');

        //For Datatable
        Route::post('testimonials/get', 'TestimonialsTableController')->name('testimonials.get');
    });
    
});