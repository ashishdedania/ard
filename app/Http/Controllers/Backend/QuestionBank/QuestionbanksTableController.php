<?php

namespace App\Http\Controllers\Backend\QuestionBank;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\QuestionBank\QuestionbankRepository;
use App\Http\Requests\Backend\QuestionBank\ManageQuestionbankRequest;

/**
 * Class QuestionbanksTableController.
 */
class QuestionbanksTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var QuestionbankRepository
     */
    protected $questionbank;

    /**
     * contructor to initialize repository object
     * @param QuestionbankRepository $questionbank;
     */
    public function __construct(QuestionbankRepository $questionbank)
    {
        $this->questionbank = $questionbank;
    }

    /**
     * This method return the data of the model
     * @param ManageQuestionbankRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageQuestionbankRequest $request)
    {

        return Datatables::of($this->questionbank->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('status', function ($questionbank) {
                return $questionbank->status_label;
            })

            ->addColumn('questionName', function ($questionbank) {
                return $questionbank->questionName;
            })
            
            ->addColumn('created_at', function ($questionbank) {
                return Carbon::parse($questionbank->created_at)->toDateString();
            })
            ->addColumn('actions', function ($questionbank) {
                return $questionbank->action_buttons;
            })
            ->make(true);
    }
}
