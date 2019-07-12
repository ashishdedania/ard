
  <?php
          $link = '';



	//	echo " Resource Name: ".\Request::route()->getName(); exit;
        if(\Request::route()->getName() == 'frontend.index')
        {
          // home page

          $page = DB::table('pages')->where('id', 12)->first();
          $link =  $page->canonical_link;
          

        }



        if(\Request::route()->getName() == 'frontend.about-us')
        {
          // abu us page
          $page = DB::table('pages')->where('id', 7)->first();
          $link =  $page->canonical_link;
          

        }

        
        if(\Request::route()->getName() == 'frontend.indoor-applications')
        {
          
          $page = DB::table('indoor_collection_image')->where('id', 1)->first();
          $link =  $page->canonical_link;

        }


        if(\Request::route()->getName() == 'frontend.outdoor-applications')
        {
          $page = DB::table('outdoor_collection_image')->where('id', 1)->first();
          $link =  $page->canonical_link;
        }






        

        if(\Request::route()->getName() == 'frontend.get-child-collections')
        {
          
         
          $sub = \Route::current()->parameter('sub');

          $page = DB::table('stone_product')->where('slug_id', $sub)->first();
          



          if($page)
          {
            
            $link = $page->canonical_link;
            

          }
          else
          {
            $page = DB::table('sub_stone_collection')->where('slug_id', $sub)->first();
            $link = $page->canonical_link;
            


          }

        }

       


        if(\Request::route()->getName() == 'frontend.contact-us')
        {
          // contact us page
          $page = DB::table('pages')->where('id', 11)->first();
          $link =  $page->canonical_link;
          
        }


        


        if(\Request::route()->getName() == 'frontend.get-collections')
        {
          
          $id = \Route::current()->parameter('id');

          $page = DB::table('stone_collection')->where('slug_id', $id)->first();
          $link = $page->canonical_link;
          


        }

        if(\Request::route()->getName() == 'frontend.collections')
        {
          
          

          $page = DB::table('stone_collection_image')->first();
          $link = $page->canonical_link;
          


        }

if($link != "")
{
$clink = str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$link);
echo '<link rel="canonical" href="'.$clink.'" />';
}

     
  ?>


  