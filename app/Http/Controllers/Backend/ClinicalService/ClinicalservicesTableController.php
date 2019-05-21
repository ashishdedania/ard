<?php

namespace App\Http\Controllers\Backend\ClinicalService;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\ClinicalService\ClinicalserviceRepository;
use App\Http\Requests\Backend\ClinicalService\ManageClinicalserviceRequest;

/**
 * Class ClinicalservicesTableController.
 */
class ClinicalservicesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ClinicalserviceRepository
     */
    protected $clinicalservice;

    /**
     * contructor to initialize repository object
     * @param ClinicalserviceRepository $clinicalservice;
     */
    public function __construct(ClinicalserviceRepository $clinicalservice)
    {
        $this->clinicalservice = $clinicalservice;
    }

    /**
     * This method return the data of the model
     * @param ManageClinicalserviceRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageClinicalserviceRequest $request)
    {
        return Datatables::of($this->clinicalservice->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('status', function ($clinicalservice) {
                return $clinicalservice->status_label;
            })
            ->addColumn('created_by', function ($clinicalservice) {
                return $clinicalservice->user_name;
            })
            ->addColumn('created_at', function ($clinicalservice) {
                return Carbon::parse($clinicalservice->created_at)->toDateString();
            })
            ->addColumn('actions', function ($clinicalservice) {
                return $clinicalservice->action_buttons;
            })
            ->make(true);
    }
}
