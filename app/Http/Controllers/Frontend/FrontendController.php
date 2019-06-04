<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use App\Repositories\Backend\StoneCollection\StoneCollectionRepository;
use DB;
use App\Models\StoneCollection\StoneCollection;
use App\Models\SubStoneCollection\SubStoneCollection;

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
    public function production()
    { 
        return view('frontend.production');
    }
}
