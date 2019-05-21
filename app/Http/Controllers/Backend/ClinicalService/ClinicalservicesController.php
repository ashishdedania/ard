<?php

namespace App\Http\Controllers\Backend\ClinicalService;

use App\Models\ClinicalService\Clinicalservice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\ClinicalService\ClinicalserviceRepository;
use App\Http\Requests\Backend\ClinicalService\ManageClinicalserviceRequest;
use App\Http\Requests\Backend\ClinicalService\CreateClinicalserviceRequest;
use App\Http\Requests\Backend\ClinicalService\StoreClinicalserviceRequest;
use App\Http\Requests\Backend\ClinicalService\EditClinicalserviceRequest;
use App\Http\Requests\Backend\ClinicalService\UpdateClinicalserviceRequest;

/**
 * ClinicalservicesController
 */
class ClinicalservicesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ClinicalserviceRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ClinicalserviceRepository $repository;
     */
    public function __construct(ClinicalserviceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\ClinicalService\ManageClinicalserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageClinicalserviceRequest $request)
    {
        return view('backend.clinicalservices.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateClinicalserviceRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateClinicalserviceRequest $request)
    {
        return view('backend.clinicalservices.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreClinicalserviceRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicalserviceRequest $request)
    {
        //Input received from the request
        //$input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($request->all());
        //return with successfull message
        return redirect()->route('admin.clinicalservices.index')->withFlashSuccess(trans('alerts.backend.clinicalservices.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ClinicalService\Clinicalservice  $clinicalservice
     * @param  EditClinicalserviceRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinicalservice $clinicalservice, EditClinicalserviceRequest $request)
    {
        return view('backend.clinicalservices.edit', compact('clinicalservice'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateClinicalserviceRequestNamespace  $request
     * @param  App\Models\ClinicalService\Clinicalservice  $clinicalservice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClinicalserviceRequest $request, Clinicalservice $clinicalservice)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $clinicalservice, $request->all());
        //return with successfull message
        return redirect()->route('admin.clinicalservices.index')->withFlashSuccess(trans('alerts.backend.clinicalservices.updated'));
    }
    
}
