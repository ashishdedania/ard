<?php

namespace App\Http\Controllers\Backend\Testimonial;

use App\Models\Testimonial\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Testimonial\CreateResponse;
use App\Http\Responses\Backend\Testimonial\EditResponse;
use App\Repositories\Backend\Testimonial\TestimonialRepository;
use App\Http\Requests\Backend\Testimonial\ManageTestimonialRequest;
use App\Http\Requests\Backend\Testimonial\CreateTestimonialRequest;
use App\Http\Requests\Backend\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Backend\Testimonial\EditTestimonialRequest;
use App\Http\Requests\Backend\Testimonial\UpdateTestimonialRequest;
use App\Http\Requests\Backend\Testimonial\DeleteTestimonialRequest;

/**
 * TestimonialsController
 */
class TestimonialsController extends Controller
{
    /**
     * variable to store the repository object
     * @var TestimonialRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TestimonialRepository $repository;
     */
    public function __construct(TestimonialRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Testimonial\ManageTestimonialRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTestimonialRequest $request)
    {
        if (access()->user()->roles()->first()->id == env('CLIENT_ROLE_ID')) {
           
            $clientId = Client::where('user_id', access()->user()->id)->first();
           
            $getintervention_type_id = $this->repository->getintervention_type_id($clientId);

            foreach ($getintervention_type_id as $key => $value) {
               
                $interventionType[] = \DB::table('interventions_type')->where('id', $value->intervention_type)->pluck('id', 'name')->toArray();
                $intervention_client_status[] = $value->status;

                
            }

            return view('backend.testimonials.app.index', compact('interventionType', 'intervention_client_status'));
        }
        return new ViewResponse('backend.testimonials.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTestimonialRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Testimonial\CreateResponse
     */
    public function addComment($intervention_type_id) 
    {
        $interventionType = \DB::table("interventions_type")->where('id', $intervention_type_id)->pluck('name');

        $clientId = Client::where('user_id', access()->user()->id)->first();

        $getTestimonialsdetails = \DB::table('testimonials')->where('client_id', $clientId['id'])->where('intervention_type', $intervention_type_id)->get();

        if ($getTestimonialsdetails == "[]") 
        {
            return view('backend.testimonials.app.addtestimonial', compact('intervention_type_id', 'clientId', 'interventionType'));
        } else 
        {

            return view('backend.testimonials.app.viewtestimonial', compact('intervention_type_id', 'clientId', 'interventionType', 'getTestimonialsdetails'));
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTestimonialRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function storeTestimonial($intervention_type_id, Request $request)
    {
       $client = Client::where('user_id', access()->user()->id)->first();

        $input['comment'] = $request['comment'];

        $insert = \DB::table('testimonials')->insert(
                ['client_id' => $client->id, 'comment' => nl2br($input['comment']),'intervention_type' => $intervention_type_id]);

        if ($insert) {
            return new RedirectResponse(route('admin.testimonials.index'), ['flash_success' => trans('alerts.backend.testimonials.created')]);
        }
    }
    
}
