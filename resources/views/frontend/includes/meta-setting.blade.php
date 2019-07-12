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



        //if(\Request::route()->getName() == 'frontend.pages.show')
        if(\Request::route()->getName() == 'frontend.about-us')
		{
          // abu us page
          $page = DB::table('pages')->where('id', 7)->first();
		  
          $metatitle =  $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;

        }



        /*if(\Request::route()->getName() == 'frontend.indoor' || \Request::route()->getName() == 'frontend.outdoor')
        {
          
          $id = \Route::current()->parameter('id');

          $page = DB::table('indoor_outdoor')->where('id', $id)->first();
          $metatitle =  $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;


        }*/



        if(\Request::route()->getName() == 'frontend.indoor-applications')
        {
          
          

          $page = DB::table('indoor_collection_image')->where('id', 1)->first();
          $metatitle =  $page->meta_title;
          $metadesc = $page->meta_description;


        }


        if(\Request::route()->getName() == 'frontend.outdoor-applications')
        {
          
          

          $page = DB::table('outdoor_collection_image')->where('id', 1)->first();
          $metatitle =  $page->meta_title;
          $metadesc = $page->meta_description;


        }






        /*if(\Request::route()->getName() == 'frontend.stone-collections')
        {
          // sub collection, product collection page

          $id = \Route::current()->parameter('sub');

          if($id == 0)
          {
            $page = DB::table('sub_stone_collection')->first();
          }
          else
          {
            $page = DB::table('sub_stone_collection')->where('id', $id)->first();
          }

          
          $metatitle = $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;

        }*/



        if(\Request::route()->getName() == 'frontend.get-child-collections')
        {
          
         
          $sub = \Route::current()->parameter('sub');

          $page = DB::table('stone_product')->where('slug_id', $sub)->first();
          



        if($page)
        {
          
          $metatitle = $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;

        }
        else
        {
          $page = DB::table('sub_stone_collection')->where('slug_id', $sub)->first();
          $metatitle = $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;


        }




          


        }


        
        /*if(\Request::route()->getName() == 'frontend.gemstone-collections-all')
        {
          // sub collection, product collection page

          

          $id = \Route::current()->parameter('sub');

          if($id == 0)
          {
            $page = DB::table('stone_product')->first();
          }
          else
          {
            $page = DB::table('stone_product')->where('id', $id)->first();
          }

          
          $metatitle = $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;

        }*/



        if(\Request::route()->getName() == 'frontend.contact-us')
        {
          // contact us page
          $page = DB::table('pages')->where('id', 11)->first();
          $metatitle =  $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;
        }


        /*if(\Request::route()->getName() == 'frontend.gemstone-collections')
        {
          
          $id = \Route::current()->parameter('id');

          $page = DB::table('stone_product')->where('slug_id', $id)->first();
          //$metatitle = $page->meta_title!=""?$page->meta_title:$page->title;
          //$metadesc = $page->meta_description;


        }*/


        if(\Request::route()->getName() == 'frontend.get-collections')
        {
          
          $id = \Route::current()->parameter('id');

          $page = DB::table('stone_collection')->where('slug_id', $id)->first();
          $metatitle = $page->meta_title!=""?$page->meta_title:$page->title;
          $metadesc = $page->meta_description;


        }

        if(\Request::route()->getName() == 'frontend.collections')
        {
          
          

          $page = DB::table('stone_collection_image')->first();
          $metatitle = $page->meta_title;
          $metadesc = $page->meta_description;


        }
     
echo '<title>'.$metatitle.'</title>'; 
echo '<meta name="description" content="'.addslashes($metadesc).'" />';
       
  
  ?>


  