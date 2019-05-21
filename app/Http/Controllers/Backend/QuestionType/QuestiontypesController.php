<?php

namespace App\Http\Controllers\Backend\QuestionType;

use App\Models\QuestionType\Questiontype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\QuestionType\CreateResponse;
use App\Http\Responses\Backend\QuestionType\EditResponse;
use App\Repositories\Backend\QuestionType\QuestiontypeRepository;
use App\Http\Requests\Backend\QuestionType\ManageQuestiontypeRequest;
use App\Http\Requests\Backend\QuestionType\CreateQuestiontypeRequest;
use App\Http\Requests\Backend\QuestionType\StoreQuestiontypeRequest;
use App\Http\Requests\Backend\QuestionType\EditQuestiontypeRequest;
use App\Http\Requests\Backend\QuestionType\UpdateQuestiontypeRequest;
use App\Http\Requests\Backend\QuestionType\DeleteQuestiontypeRequest;

/**
 * QuestiontypesController
 */
class QuestiontypesController extends Controller
{
    /**
     * variable to store the repository object
     * @var QuestiontypeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param QuestiontypeRepository $repository;
     */
    public function __construct(QuestiontypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\QuestionType\ManageQuestiontypeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageQuestiontypeRequest $request)
    {
        return new ViewResponse('backend.questiontypes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateQuestiontypeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\QuestionType\CreateResponse
     */
    public function create(CreateQuestiontypeRequest $request)
    {
        return new CreateResponse('backend.questiontypes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreQuestiontypeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreQuestiontypeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.questiontypes.index'), ['flash_success' => trans('alerts.backend.questiontypes.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\QuestionType\Questiontype  $questiontype
     * @param  EditQuestiontypeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\QuestionType\EditResponse
     */
    public function edit(Questiontype $questiontype, EditQuestiontypeRequest $request)
    {
        return new EditResponse($questiontype);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateQuestiontypeRequestNamespace  $request
     * @param  App\Models\QuestionType\Questiontype  $questiontype
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateQuestiontypeRequest $request, Questiontype $questiontype)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $questiontype, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.questiontypes.index'), ['flash_success' => trans('alerts.backend.questiontypes.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteQuestiontypeRequestNamespace  $request
     * @param  App\Models\QuestionType\Questiontype  $questiontype
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Questiontype $questiontype, DeleteQuestiontypeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($questiontype);
        //returning with successfull message
        return new RedirectResponse(route('admin.questiontypes.index'), ['flash_success' => trans('alerts.backend.questiontypes.deleted')]);
    }
    
}
