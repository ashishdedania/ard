<?php

namespace App\Http\Controllers\Backend\Feedback;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Feedback\FeedbackRepository;
use App\Http\Requests\Backend\Feedback\ManageFeedbackRequest;

/**
 * Class FeedbackTableController.
 */
class FeedbackTableController extends Controller {

    /**
     * variable to store the repository object
     * @var FeedbackRepository
     */
    protected $feedback;

    /**
     * contructor to initialize repository object
     * @param FeedbackRepository $feedback;
     */
    public function __construct(FeedbackRepository $feedback) {
        $this->feedback = $feedback;
    }

    /**
     * This method return the data of the model
     * @param ManageFeedbackRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageFeedbackRequest $request) {
        return Datatables::of($this->feedback->getForDataTable())
                        ->escapeColumns(['id'])
                        ->addColumn('comment-full', function ($feedback) {
                            return $feedback->comment;
                        })
                        ->addColumn('comment', function ($feedback) {
                            return Str::words($feedback->comment, $words = 10, $end = '..');
                        })
                        ->addColumn('created_at', function ($feedback) {
                            return Carbon::parse($feedback->created_at)->format('d-m-Y');
                        })
                        ->make(true);
    }

}
