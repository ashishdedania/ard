<?php

namespace App\Http\Controllers\Backend\QuestionBank;

use App\Models\QuestionBank\Questionbank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\QuestionBank\QuestionbankRepository;
use App\Http\Requests\Backend\QuestionBank\ManageQuestionbankRequest;
use App\Http\Requests\Backend\QuestionBank\CreateQuestionbankRequest;
use App\Http\Requests\Backend\QuestionBank\StoreQuestionbankRequest;
use App\Http\Requests\Backend\QuestionBank\EditQuestionbankRequest;
use App\Http\Requests\Backend\QuestionBank\UpdateQuestionbankRequest;
use App\Http\Requests\Backend\QuestionBank\DeleteQuestionbankRequest;
use App\Models\Behaviour\Behaviour;
use DB;
/**
 * QuestionbanksController
 */
class QuestionbanksController extends Controller
{
    /**
     * variable to store the repository object
     * @var QuestionbankRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param QuestionbankRepository $repository;
     */
    public function __construct(QuestionbankRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\QuestionBank\ManageQuestionbankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageQuestionbankRequest $request)
    {
        
        return view('backend.questionbanks.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateQuestionbankRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateQuestionbankRequest $request)
    {
        $question_type = DB::table('question_type')->where('status',1)->pluck('question_type', 'id');

        return view('backend.questionbanks.create',compact('question_type'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreQuestionbankRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionbankRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.questionbanks.index')->withFlashSuccess(trans('alerts.backend.questionbanks.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\QuestionBank\Questionbank  $questionbank
     * @param  EditQuestionbankRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionbank $questionbank, EditQuestionbankRequest $request)
    {
        $question_type = DB::table('question_type')->where('status',1)->pluck('question_type', 'id');
        $behaviour = Behaviour::where('question_type_id', $questionbank->type_id)->where('status', '=', 1)->where('is_behaviour','=',1)->pluck("behaviour", "id");
        $option_score_array = DB::table('question_option')->where('question_id',$questionbank['id'])->where('deleted_at', '=', NULL)->get()->ToArray();
        //$option_array = DB::table('question_option')->where('question_id',$questionbank['id'])->pluck('option','id')->ToArray();
        //dd($option_score_array);
        return view('backend.questionbanks.edit', compact('questionbank'))->with([
                    'question_type' => $question_type,
                    'option_score_array' => $option_score_array,
                    'behaviour'=>$behaviour]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateQuestionbankRequestNamespace  $request
     * @param  App\Models\QuestionBank\Questionbank  $questionbank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionbankRequest $request, Questionbank $questionbank)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $questionbank, $input );
        //return with successfull message
        return redirect()->route('admin.questionbanks.index')->withFlashSuccess(trans('alerts.backend.questionbanks.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteQuestionbankRequestNamespace  $request
     * @param  App\Models\QuestionBank\Questionbank  $questionbank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionbank $questionbank, DeleteQuestionbankRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($questionbank);
        //returning with successfull message
        return redirect()->route('admin.questionbanks.index')->withFlashSuccess(trans('alerts.backend.questionbanks.deleted'));
    }
    
    public function selectBehaviour(Request $request)
    {
         if ($request->ajax()) {
            $behaviour = Behaviour::where('question_type_id', $request->type_id)->where('status', '=', 1)->where('is_behaviour','=',1)->pluck("behaviour", "id")->all();
            //dd($behaviour);
            return response()->json(['behaviour' => $behaviour]);
        }
    }
}
