<?php

namespace App\Http\Controllers\Backend\QuestionType;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\QuestionType\QuestiontypeRepository;
use App\Http\Requests\Backend\QuestionType\ManageQuestiontypeRequest;

/**
 * Class QuestiontypesTableController.
 */
class QuestiontypesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var QuestiontypeRepository
     */
    protected $questiontype;

    /**
     * contructor to initialize repository object
     * @param QuestiontypeRepository $questiontype;
     */
    public function __construct(QuestiontypeRepository $questiontype)
    {
        $this->questiontype = $questiontype;
    }

    /**
     * This method return the data of the model
     * @param ManageQuestiontypeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageQuestiontypeRequest $request)
    {
        //dd($questiontype);
        return Datatables::of($this->questiontype->getForDataTable())
            ->escapeColumns(['question_type'])
            
            ->addColumn('status', function ($questiontype) {
                return $questiontype->status_label;
            })
            ->addColumn('created_at', function ($questiontype) {
                return Carbon::parse($questiontype->created_at)->toDateString();
            })
            ->addColumn('actions', function ($questiontype) {
                return $questiontype->action_buttons;
            })
            ->make(true);
    }
}
