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

        

        return view('frontend.index', ['html'=>$result->description]);
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

       $html = '<div>Contect Received </div>';
       $html .= '<div>Name : '.$name.' </div>';
       $html .= '<div>Contact Number : '.$number.' </div>';
       $html .= '<div>Email : '.$email.' </div>';
       $html .= '<div>Message : '.$content.' </div>';


$message = ['data' => $html];    
//$data['to'] = 'ashish.dedania@gmail.com';

$data['to'] = env("CONTECT_EMAIL");



$a= Mail::send(['html' => 'emails.template'], ['data' => $html], function ($message) use ($data) {
                    $message->to($data['to']);
                    $message->subject('Contact Detail Came!');
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
        return view('frontend.contactus',['html'=>$result->description]);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function stoneCollection()
    { 

        // get three images
        $images = DB::table('stone_collection_image')->where('id', 1)->first(); 

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
    public function stoneCollectionDetail($id,$sub)
    { 
        
        
        $colection     = StoneCollection::where('id', $id)->first();

        $subcolections = $colection->subcollection;



        if($sub == 0)
        {
            $selected = $subcolections->first();
        }
        else
        {
            $selected = SubStoneCollection::where('id', $sub)->first();
        }


        
        
        

        // get three images
        /*$images = DB::table('stone_collection_image')->where('id', 1)->first(); 

        $repo = new StoneCollectionRepository();
        $collectiodatas =$repo->getData();*/

//dd($stonecollection);

        // get all collection with sub product and sub collection

        return view('frontend.stonecollectiondetail',
            [
                
                'colection' => $colection,
                'subcolections' => $subcolections,
                'selected' => $selected
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
        $colection     = StoneProduct::where('id', $id)->first();
        return view('frontend.production',['product' => $colection]);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function indoor($id)
    { 
        
        $images = DB::table('indoor_collection_image')->where('id', 1)->first();

        $item = OutdoorCollection::where('id', $id)->where('is_indoor', 1)->first();

        $indoors = OutdoorCollection::where('is_indoor', 1)->get();

        
        return view('frontend.indoor',['indoors' => $indoors, 'item'=>$item, 'images'=>$images, 'id'=>$id]);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function outdoor($id)
    { 
        
        $images = DB::table('outdoor_collection_image')->where('id', 1)->first();

        $item = OutdoorCollection::where('id', $id)->where('is_indoor', 0)->first();

        $indoors = OutdoorCollection::where('is_indoor', 0)->get();

        
        return view('frontend.outdoor',['indoors' => $indoors, 'item'=>$item, 'images'=>$images, 'id'=>$id]);
    }
}
