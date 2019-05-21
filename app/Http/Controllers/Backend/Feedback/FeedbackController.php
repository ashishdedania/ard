<?php

namespace App\Http\Controllers\Backend\Feedback;

use App\Models\Feedback\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Feedback\CreateResponse;
use App\Http\Responses\Backend\Feedback\EditResponse;
use App\Repositories\Backend\Feedback\FeedbackRepository;
use App\Http\Requests\Backend\Feedback\ManageFeedbackRequest;
use App\Http\Requests\Backend\Feedback\CreateFeedbackRequest;
use App\Http\Requests\Backend\Feedback\StoreFeedbackRequest;
use App\Http\Requests\Backend\Feedback\EditFeedbackRequest;
use App\Http\Requests\Backend\Feedback\UpdateFeedbackRequest;
use App\Http\Requests\Backend\Feedback\DeleteFeedbackRequest;

/**
 * FeedbackController
 */
class FeedbackController extends Controller {

    /**
     * variable to store the repository object
     * @var FeedbackRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param FeedbackRepository $repository;
     */
    public function __construct(FeedbackRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Feedback\ManageFeedbackRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageFeedbackRequest $request) {

        if (access()->user()->roles()->first()->id == env('CLIENT_ROLE_ID')) {

            //dd(access()->user()->id);
            $clientId = Client::where('user_id', access()->user()->id)->first();
            //dd($clientId['id']);
            $getintervention_type_id = $this->repository->getintervention_type_id($clientId);

            foreach ($getintervention_type_id as $key => $value) {
                //dd($value);
                $interventionType[] = \DB::table('interventions_type')->where('id', $value->intervention_type)->pluck('id', 'name')->toArray();
                $intervention_client_status[] = $value->status;

                //dd($intervention_client_status);
            }



            return view('backend.feedbacks.app.index', compact('interventionType', 'intervention_client_status'));
        }
        return new ViewResponse('backend.feedbacks.index');
    }

    public function addComment($intervention_type_id) {
        $interventionType = \DB::table("interventions_type")->where('id', $intervention_type_id)->pluck('name');

        $clientId = Client::where('user_id', access()->user()->id)->first();

        $getFeedbackdetails = \DB::table('feedbacks')->where('client_id', $clientId['id'])->where('intervention_type', $intervention_type_id)->get();


        //dd($getFeedbackdetails);
        if ($getFeedbackdetails == "[]") {
            //dd("here");
            return view('backend.feedbacks.app.addfeedback', compact('intervention_type_id', 'clientId', 'interventionType'));
        } else {

            return view('backend.feedbacks.app.viewfeedback', compact('intervention_type_id', 'clientId', 'interventionType', 'getFeedbackdetails'));
        }
    }

    public function storeFeedback($intervention_type_id, Request $request) {
        $client = Client::where('user_id', access()->user()->id)->first();

        $input['comment'] = $request['comment'];
        $input['rating'] = $request['ratingsValues'];

        $insert = \DB::table('feedbacks')->insert(
                ['client_id' => $client->id, 'comment' => nl2br($input['comment']), 'ratings' => $input['rating'], 'intervention_type' => $intervention_type_id]);

        if ($insert) {
            return new RedirectResponse(route('admin.feedback.index'), ['flash_success' => trans('alerts.backend.feedback.created')]);
        }
    }

}
