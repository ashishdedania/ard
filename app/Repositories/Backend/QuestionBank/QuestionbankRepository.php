<?php

namespace App\Repositories\Backend\QuestionBank;

use DB;
use Carbon\Carbon;
use App\Models\QuestionBank\Questionbank;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuestionOption\QuestionOption;

/**
 * Class QuestionbankRepository.
 */
class QuestionbankRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Questionbank::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        //dd(config('module.questions.table'));

        return $this->query()
           ->leftjoin('question_type', 'question_type.id', '=', config('module.questions.table').'.type_id')
            ->select([
                config('module.questions.table').'.id',
                'question_type'.'.question_type as questionName',
                config('module.questions.table').'.question',
                config('module.questions.table').'.type_id',
                config('module.questions.table').'.status',
                config('module.questions.table').'.created_at',
                config('module.questions.table').'.updated_at',
                
            ]);
            // ->orderBy(config('module.questions.table').'.id', 'DESC');
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {      
    
        $questionbank = self::MODEL;      
        
        $questionbank = new $questionbank();
        $questionbank['type_id'] =  $input['type_id'];
        $questionbank['question'] = $input['question']; 
        $questionbank['status'] = isset($input['status']) ? 1 : 0;

        if(isset($input['choose_behaviour']))
        {
            $questionbank['behaviour_id'] = $input['choose_behaviour'];
        }
        else
        {
             $questionbank['behaviour_id'] = NULL;
        }
        
        if ($questionbank->save()) 
        {
            

            foreach($input['score'] as $key =>  $score)
            {  
                 // $score_array[] = $score;   

                $score_array[] = [
                    'question_id' => $questionbank->id,
                    'option' => $input['option'][$key],
                    'marks' => $score

                ];

            }
            $addQuestionOption = DB::table('question_option')->insert($score_array);
            
            return true;
         }
        throw new GeneralException(trans('exceptions.backend.questionbanks.create_error'));
       
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Questionbank $questionbank
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Questionbank $questionbank, array $input)
    {
        //dd($input);
        $questionbank['type_id'] =  $input['type_id'];
        $questionbank['question'] = $input['question']; 
        $questionbank['status'] = isset($input['status']) ? 1 : 0;
        if(isset($input['choose_behaviour']))
        {
            $questionbank['behaviour_id'] = $input['choose_behaviour'];
        }
        else if(empty($input['choose_behaviour']))
        {
             $questionbank['behaviour_id'] = NULL;
        }
        
    	if ($questionbank->update())
        {
             
            if(isset($input['score_new']))
            {
                foreach($input['score_new'] as $key =>  $score)
                {    
                    $score_array[] = [
                    'question_id' => $questionbank->id,
                    'option' => $input['option_new'][$key],
                    'marks' => $score
                    ];
                }     
            }

           
                 //dd($score_array);
            $option_score_array = DB::table('question_option')->where('question_id',$questionbank['id'])->get()->ToArray();

            if(isset($input['option_score_id']))
            {
               
                foreach ($input['option_score_id'] as $key => $option_score_id)
                {
                    $updateQuestionOption = DB::table('question_option')->where('id',$option_score_id)->update(array('option' => $input['option'][$key],'marks'=> $input['score'][$key]));       
                } 
                
               
                
                   foreach ($option_score_array as $key => $value) 
                   {
                        //dd($option_score_id);
                        if(!in_array($value->id,$input['option_score_id']))
                        {
                            $updateQuestionOption = QuestionOption::where('id',$value->id)->delete();       
                        }
                        
                   }
               
            }

            /*$option_score_array = DB::table('question_option')->where('question_id',$questionbank['id'])->get()->ToArray();
                   foreach ($option_score_array as $key => $value) 
                   {
                        foreach ($input['option_score_id'] as $key => $option_score_id)
                        {
                            if($option_score_id!= $value->id)
                            {
                                $updateQuestionOption = DB::table('question_option')->where('id',$option_score_id)->delete();       
                            }
                        }
                   }*/

            if(isset($score_array))
            {

                $addQuestionOption = DB::table('question_option')->insert($score_array);
                
            }
            if(empty($input['option_score_id']))
            {
                foreach ($option_score_array as $key => $value) 
                       {
                            //dd($option_score_id);
                            if(!in_array($value->id,$score_array))
                            {
                                $updateQuestionOption = QuestionOption::where('id',$value->id)->delete();       
                            }   
                       }
            }
            
            return true;
        }  

        throw new GeneralException(trans('exceptions.backend.questionbanks.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Questionbank $questionbank
     * @throws GeneralException
     * @return bool
     */
    public function delete(Questionbank $questionbank)
    {
        if ($questionbank->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.questionbanks.delete_error'));
    }
}
