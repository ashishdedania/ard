<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Client\ManageClientRequest;
use App\Repositories\Backend\Client\ClientRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ClientsTableController.
 */
class ClientsTableController extends Controller {

    /**
     * variable to store the repository object
     * @var ClientRepository
     */
    protected $client;

    /**
     * contructor to initialize repository object
     * @param ClientRepository $client;
     */
    public function __construct(ClientRepository $client) {
        $this->client = $client;
    }

    /**
     * This method return the data of the model
     * @param ManageClientRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageClientRequest $request) {
        return Datatables::of($this->client->getForDataTable())
                        ->escapeColumns(['id'])
                        ->addColumn('status', function ($client) {
                            return $client->status_label;
                        })
                        ->addColumn('session', function ($client) {
                        if ($client->session == 0) {
                            return "-";
                        } else {
                            return "S". $client->session;
                        }
                    })
                       ->addColumn('dob', function ($client) {
                            return Carbon::parse($client->dob)->format('d-m-Y');
                       })
//			->addColumn('interventionName', function ($client) {
//				return "<label class='label label-info'>".$client->interventionName.'</label>';
//
//			})
                        ->addColumn('created_at', function ($client) {
                            return Carbon::parse($client->created_at)->format('d-m-Y');
                        })
                        ->addColumn('actions', function ($client) {
                            return $client->action_buttons;
                        })
                        ->make(true);
    }

}
