<!-- Navigation -->

  <?php
          $metatitle = '';
          $metadesc = '';


        if(\Request::route()->getName() == 'frontend.index')
        {
          // home page

          $page = DB::table('pages')->where('id', 12)->first();
          $metatitle =  $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;

        }



        if(\Request::route()->getName() == 'frontend.pages.show')
        {
          // abu us page
          $page = DB::table('pages')->where('id', 7)->first();
          $metatitle =  $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;

        }



        if(\Request::route()->getName() == 'frontend.indoor' || \Request::route()->getName() == 'frontend.outdoor')
        {
          
          $id = \Route::current()->parameter('id');

          $page = DB::table('indoor_outdoor')->where('id', $id)->first();
          $metatitle =  $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;


        }


        if(\Request::route()->getName() == 'frontend.stone-product-detail' || \Request::route()->getName() == 'frontend.stone-collection-detail')
        {
          // sub collection, product collection page

          $id = \Route::current()->parameter('id');

          $page = DB::table('stone_collection')->where('id', $id)->first();
          $metatitle = $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;

        }



        if(\Request::route()->getName() == 'frontend.contact-us')
        {
          // contact us page
          $page = DB::table('pages')->where('id', 11)->first();
          $metatitle =  $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;
        }


        if(\Request::route()->getName() == 'frontend.production')
        {
          
          $id = \Route::current()->parameter('id');

          $page = DB::table('stone_product')->where('id', $id)->first();
          $metatitle = $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;


        }
     
echo '<title>'.$metatitle.'</title>'; 
echo '<meta name="description" content="'.addslashes($metadesc).'" />';
       
  
  ?>


  