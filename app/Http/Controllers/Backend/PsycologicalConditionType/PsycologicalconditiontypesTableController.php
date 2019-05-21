<?php

namespace App\Http\Controllers\Backend\PsycologicalConditionType;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\PsycologicalConditionType\PsycologicalconditiontypeRepository;
use App\Http\Requests\Backend\PsycologicalConditionType\ManagePsycologicalconditiontypeRequest;

/**
 * Class PsycologicalconditiontypesTableController.
 */
class PsycologicalconditiontypesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PsycologicalconditiontypeRepository
     */
    protected $psycologicalconditiontype;

    /**
     * contructor to initialize repository object
     * @param PsycologicalconditiontypeRepository $psycologicalconditiontype;
     */
    public function __construct(PsycologicalconditiontypeRepository $psycologicalconditiontype)
    {
        $this->psycologicalconditiontype = $psycologicalconditiontype;
    }

    /**
     * This method return the data of the model
     * @param ManagePsycologicalconditiontypeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePsycologicalconditiontypeRequest $request)
    {
        return Datatables::of($this->psycologicalconditiontype->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('status', function ($psycologicalconditiontype) {
                return $psycologicalconditiontype->status_label;
            })
            ->addColumn('created_by', function ($psycologicalconditiontype) {
                return $psycologicalconditiontype->user_name;
            })
            ->addColumn('created_at', function ($psycologicalconditiontype) {
                return Carbon::parse($psycologicalconditiontype->created_at)->toDateString();
            })
            ->addColumn('actions', function ($psycologicalconditiontype) {
                return $psycologicalconditiontype->action_buttons;
            })
            ->make(true);
    }
}
