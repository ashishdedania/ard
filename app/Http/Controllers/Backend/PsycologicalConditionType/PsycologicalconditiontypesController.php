<?php

namespace App\Http\Controllers\Backend\PsycologicalConditionType;

use App\Models\PsycologicalConditionType\Psycologicalconditiontype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\PsycologicalConditionType\PsycologicalconditiontypeRepository;
use App\Http\Requests\Backend\PsycologicalConditionType\ManagePsycologicalconditiontypeRequest;
use App\Http\Requests\Backend\PsycologicalConditionType\CreatePsycologicalconditiontypeRequest;
use App\Http\Requests\Backend\PsycologicalConditionType\StorePsycologicalconditiontypeRequest;
use App\Http\Responses\ViewResponse;
use App\Http\Requests\Backend\PsycologicalConditionType\EditPsycologicalconditiontypeRequest;
use App\Http\Requests\Backend\PsycologicalConditionType\UpdatePsycologicalconditiontypeRequest;

/**
 * PsycologicalconditiontypesController
 */
class PsycologicalconditiontypesController extends Controller
{
    /**
     * variable to store the repository object
     * @var PsycologicalconditiontypeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PsycologicalconditiontypeRepository $repository;
     */
    public function __construct(PsycologicalconditiontypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\PsycologicalConditionType\ManagePsycologicalconditiontypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManagePsycologicalconditiontypeRequest $request)
    {
        return new ViewResponse('backend.psycologicalconditiontypes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePsycologicalconditiontypeRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreatePsycologicalconditiontypeRequest $request)
    {
        return view('backend.psycologicalconditiontypes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePsycologicalconditiontypeRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePsycologicalconditiontypeRequest $request)
    {
        //Input received from the request
        //$input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($request->all());
        //return with successfull message
        return redirect()->route('admin.psycologicalconditiontypes.index')->withFlashSuccess(trans('alerts.backend.psycologicalconditiontypes.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\PsycologicalConditionType\Psycologicalconditiontype  $psycologicalconditiontype
     * @param  EditPsycologicalconditiontypeRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Psycologicalconditiontype $psycologicalconditiontype, EditPsycologicalconditiontypeRequest $request)
    {
        return view('backend.psycologicalconditiontypes.edit', compact('psycologicalconditiontype'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePsycologicalconditiontypeRequestNamespace  $request
     * @param  App\Models\PsycologicalConditionType\Psycologicalconditiontype  $psycologicalconditiontype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePsycologicalconditiontypeRequest $request, Psycologicalconditiontype $psycologicalconditiontype)
    {
        
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $psycologicalconditiontype, $request->all());
        //return with successfull message
        return redirect()->route('admin.psycologicalconditiontypes.index')->withFlashSuccess(trans('alerts.backend.psycologicalconditiontypes.updated'));
    }
    
}
