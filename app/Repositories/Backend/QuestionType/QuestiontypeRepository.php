<?php

namespace App\Repositories\Backend\QuestionType;

use DB;
use Carbon\Carbon;
use App\Models\QuestionType\Questiontype;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestiontypeRepository.
 */
class QuestiontypeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Questiontype::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.question_type.table').'.id',
                config('module.question_type.table').'.question_type',
                config('module.question_type.table').'.status',
                config('module.question_type.table').'.created_at',
                config('module.question_type.table').'.updated_at',
            ]);
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
        if (Questiontype::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.questiontypes.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Questiontype $questiontype
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Questiontype $questiontype, array $input)
    {
        $input['question_type'] = $input['question_type'];
        $input['status'] = isset($input['status']) ? 1 : 0;
    	if ($questiontype->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.questiontypes.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Questiontype $questiontype
     * @throws GeneralException
     * @return bool
     */
    public function delete(Questiontype $questiontype)
    {
        if ($questiontype->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.questiontypes.delete_error'));
    }
}
