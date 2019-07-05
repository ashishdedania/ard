<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use App\Repositories\Backend\StoneCollection\StoneCollectionRepository;
use DB;
use App\Models\StoneCollection\StoneCollection;
use App\Models\SubStoneCollection\SubStoneCollection;
use App\Models\StoneProduct\StoneProduct;
use App\Models\OutdoorCollection\OutdoorCollection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    { 
      
        $result = DB::table('pages')->where('id', 12)->first();

        
        

        return view('frontend.index', ['html'=>str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$result->description)]);
    }

    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    { 
        $result = $pages->findBySlug($slug);

        return view('frontend.pages.index')
            ->withpage($result);
    }



    public function getajax(Request $request)
    {
        $input = $request->except(['_token']);
        
        $item = OutdoorCollection::where('id', $input['id'])->first();


        $description = $item->description;
        $masonry = '<div class="row">';

       
          
        if(isset($item->items)) { 

            $i=1; 

          
            foreach($item->items as $indoorItem)
            {

             $masonry = $masonry . '<div class="col">';
             $masonry = $masonry . '<a href="#exampleModal'.$indoorItem->id.'" data-toggle="modal"><img src="'.\URL::to('/').'/images/'.$indoorItem->image1.'" alt="'.$indoorItem->title.'"></a>
            </div>'; 

            
              if($i % 3 == 0)
              { 
                $masonry = $masonry . '</div> <div class="row">';
         
              }
              $i = $i +1; 
            }
        }

        $masonry = $masonry . '</div>';

        $model = '';


        foreach($item->items as $indoorItem)
        {

  $model = $model . '<div class="modal fade" id="exampleModal'.$indoorItem->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModal'.$indoorItem->id.'Label" aria-hidden="true">
  <div class="modal-dialog collection-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="'. \URL::to('/') .'/images/close.png" alt="">
      </button>
      <div class="modal-body">

          <div class="left-img">
          <img src="'. \URL::to('/') .'/images/'.$indoorItem->image1.'" class="w-100" alt="">
          </div>
          <div class="info-block">
            <h2>'.$indoorItem->title.'</h2>
            <p>'.$indoorItem->description.'
</p>
          </div>

      </div>

    </div>
  </div>
</div>';

        }



        echo json_encode([
            'description' =>$description,
            'model' => $model,
            'masonry' => $masonry    

        ]);


    }


    public function sendcontact(Request $request)
    { $input = $request->except(['_token']);
       

       /*$name = 'Rben';
       $number = '9909872134'; 
       $email='a@a.com';
       $content = 'Hello this is good';*/


       $name = $input['name'];
       $number = $input['number'];
       $email=$input['email'];
       $content = $input['message'];

       $html = '<p>New contact request has been received </p>';
       $html .= '<p>Name : '.$name.' <br>';
       $html .= 'Contact Number : '.$number.' <br>';
       $html .= 'Email : '.$email.' <br>';
       $html .= 'Message : '.$content.' <br></p>';





$message = ['data' => $html];    
//$data['to'] = 'ashish.dedania@gmail.com';

$data['to'] = env("CONTECT_EMAIL");



$a= Mail::send(['html' => 'emails.template'], ['data' => $html], function ($message) use ($data) {
                    $message->to($data['to']);
                    $message->subject('Contact request has been submitted!');
                    $message->from('hello@app.com', 'Stone By Rander');
                    
                }); 


return 'success';

}






    /**
     * @return \Illuminate\View\View
     */
    public function contactus()
    { 


        $result = DB::table('pages')->where('id', 11)->first();
        return view('frontend.contactus',['html'=>str_replace('#WEBSITE_URL#',env('WEBSITE_URL'),$result->description)]);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function stoneCollection()
    { 

        $images = [];
        // get three images
        $data = DB::table('stone_collection_image')->where('id', 1)->first(); 

        if($data)
            
        {
            if(!empty($data->image1))
            {
                array_push($images,$data->image1);
                
            }
            if(!empty($data->image2))
            {
                 array_push($images,$data->image2);
            }
            if(!empty($data->image3))
            {
                 array_push($images,$data->image3);
            }
            
        }

        

        $repo = new StoneCollectionRepository();
        $collectiodatas =$repo->getData();

//dd($stonecollection);

        // get all collection with sub product and sub collection

        return view('frontend.stonecollection',
            [
                'images' => $images,
                'collectiodatas' => $collectiodatas
            ]
        );
    }



    /**
     * @return \Illuminate\View\View
     */
    public function getCollection($id)
    { 
        
        
        $colection     = StoneCollection::where('slug_id', $id)->first();
        $products      = $colection->product;
        $subcolections = $colection->subcollection;
        $is_product_collection = false;


        if($products->count() > 0)
        {
          // it is product collection gemstone
          $selected = $products->first();
          $is_product_collection = true;

        }
        else
        {
          $selected = $subcolections->first();
        }

        

        
        $images = [];
        // get three images
        $data = $colection; 

        if($data)
            
        {
            if(!empty($data->image1))
            {
                array_push($images,$data->image1);
                
            }
            if(!empty($data->image2))
            {
                 array_push($images,$data->image2);
            }
            if(!empty($data->image3))
            {
                 array_push($images,$data->image3);
            }
            
        }



        if($is_product_collection)
        {
          return view('frontend.stoneproductdetail2',
              [
                  
                  'colection' => $colection,
                  'subcolections' => $products,
                  'selected' => $selected,
                  'images' => $images,
              ]
          );

        }
        else
        {

            // get all collection with sub product and sub collection

            return view('frontend.stonecollectiondetail2',
                [
                    
                    'colection' => $colection,
                    'subcolections' => $subcolections,
                    'selected' => $selected,
                    'images' => $images,
                ]
            );

        }
    }



    /**
     * @return \Illuminate\View\View
     */
    public function getChildCollection($id,$sub)
    { 
        
        
        $colection     = StoneCollection::where('slug_id', $id)->first();
        $products      = $colection->product;
        $subcolections = $colection->subcollection;
        $is_product_collection = false;



        if($products->count() > 0)
        {
          $colection     = StoneProduct::where('slug_id', $sub)->first();
        $images = [];
       if($colection)
            
        {
            if(!empty($colection->image1))
            {
                array_push($images,$colection->image1);
                
            }
            if(!empty($colection->image2))
            {
                 array_push($images,$colection->image2);
            }
            if(!empty($colection->image3))
            {
                 array_push($images,$colection->image3);
            }
            
        }
          $is_product_collection = true;
          return view('frontend.production',['product' => $colection, 'images' => $images]);

        }

          
        else
        {
          $selected = SubStoneCollection::where('slug_id', $sub)->first();
  



        
          $images = [];
          // get three images
          $data = $colection; 

          if($data)
              
          {
              if(!empty($data->image1))
              {
                  array_push($images,$data->image1);
                  
              }
              if(!empty($data->image2))
              {
                   array_push($images,$data->image2);
              }
              if(!empty($data->image3))
              {
                   array_push($images,$data->image3);
              }
              
          }



            return view('frontend.stonecollectiondetail2',
              [
                  
                  'colection' => $colection,
                  'subcolections' => $subcolections,
                  'selected' => $selected,
                  'images' => $images,
              ]
          );
        }


        

      

        // get all collection with sub product and sub collection

        
    }



    /**
     * @return \Illuminate\View\View
     */
    public function stoneCollectionDetail($id,$sub)
    { 
        
        
        $colection     = StoneCollection::where('slug_id', $id)->first();

        $subcolections = $colection->subcollection;



        if($sub == 'all')
        {
            $selected = $subcolections->first();
        }
        else
        {
            $selected = SubStoneCollection::where('slug_id', $sub)->first();
        }


        
        $images = [];
        // get three images
        $data = $colection; 

        if($data)
            
        {
            if(!empty($data->image1))
            {
                array_push($images,$data->image1);
                
            }
            if(!empty($data->image2))
            {
                 array_push($images,$data->image2);
            }
            if(!empty($data->image3))
            {
                 array_push($images,$data->image3);
            }
            
        }

      

        // get all collection with sub product and sub collection

        return view('frontend.stonecollectiondetail',
            [
                
                'colection' => $colection,
                'subcolections' => $subcolections,
                'selected' => $selected,
                'images' => $images,
            ]
        );
    }



    /**
     * @return \Illuminate\View\View
     */
    public function stoneProductDetail($id,$sub)
    { 
        
        
        $colection     = StoneCollection::where('slug_id', $id)->first();

        $subcolections = $colection->product;



        if($sub == 'all')
        {
            $selected = $subcolections->first();
        }
        else
        {
            $selected = StoneProduct::where('slug_id', $sub)->first();
        }


        
        $images = [];
        // get three images
        $data = $colection; 

        if($data)
            
        {
            if(!empty($data->image1))
            {
                array_push($images,$data->image1);
                
            }
            if(!empty($data->image2))
            {
                 array_push($images,$data->image2);
            }
            if(!empty($data->image3))
            {
                 array_push($images,$data->image3);
            }
            
        }

        

        // get three images
        /*$images = DB::table('stone_collection_image')->where('id', 1)->first(); 

        $repo = new StoneCollectionRepository();
        $collectiodatas =$repo->getData();*/

//dd($stonecollection);

        // get all collection with sub product and sub collection

        return view('frontend.stoneproductdetail',
            [
                
                'colection' => $colection,
                'subcolections' => $subcolections,
                'selected' => $selected,
                'images' => $images,
            ]
        );
    }


    /**
     * @return \Illuminate\View\View
     */
    public function stoneTalk()
    { 
        return view('frontend.stoneTalk');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function production($id)
    { 
        $colection     = StoneProduct::where('slug_id', $id)->first();
		    $images = [];
		   if($colection)
            
        {
            if(!empty($colection->image1))
            {
                array_push($images,$colection->image1);
                
            }
            if(!empty($colection->image2))
            {
                 array_push($images,$colection->image2);
            }
            if(!empty($colection->image3))
            {
                 array_push($images,$colection->image3);
            }
            
        }
		
        return view('frontend.production',['product' => $colection, 'images' => $images]);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function indoor()
    { 
        
        
        
        $indoor = DB::table('indoor_outdoor')->where('is_indoor', 1)->orderBy('id')->first();
        
        if($indoor)
        {
            $id = $indoor->id;
        }

        $images = [];
        // get three images
        $data = DB::table('indoor_collection_image')->where('id', 1)->first(); 

        if($data)
            
        {
            if(!empty($data->image1))
            {
                array_push($images,$data->image1);
                
            }
            if(!empty($data->image2))
            {
                 array_push($images,$data->image2);
            }
            if(!empty($data->image3))
            {
                 array_push($images,$data->image3);
            }
            
        }



        $item = OutdoorCollection::where('id', $id)->where('is_indoor', 1)->first();

        $indoors = OutdoorCollection::where('is_indoor', 1)->get();

        
        return view('frontend.indoor',['indoors' => $indoors, 'item'=>$item, 'images'=>$images, 'id'=>$id]);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function outdoor()
    { 

        $outdoor = DB::table('indoor_outdoor')->where('is_indoor', 0)->orderBy('id')->first(); 
        
        if($outdoor)
        {
            $id = $outdoor->id;
        }
        
        

        $images = [];
        // get three images
        $data = DB::table('outdoor_collection_image')->where('id', 1)->first(); 

        if($data)
            
        {
            if(!empty($data->image1))
            {
                array_push($images,$data->image1);
                
            }
            if(!empty($data->image2))
            {
                 array_push($images,$data->image2);
            }
            if(!empty($data->image3))
            {
                 array_push($images,$data->image3);
            }
            
        }

        $item = OutdoorCollection::where('id', $id)->where('is_indoor', 0)->first();

        $indoors = OutdoorCollection::where('is_indoor', 0)->get();

        
        return view('frontend.outdoor',['indoors' => $indoors, 'item'=>$item, 'images'=>$images, 'id'=>$id]);
    }
}
