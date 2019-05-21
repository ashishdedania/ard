<?php

namespace App\Repositories\Backend\PsycologicalConditionType;

use DB;
use Carbon\Carbon;
use App\Models\PsycologicalConditionType\Psycologicalconditiontype;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PsycologicalconditiontypeRepository.
 */
class PsycologicalconditiontypeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Psycologicalconditiontype::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.psycologicalconditiontypes.table').'.created_by')
            ->select([
                config('module.psycologicalconditiontypes.table').'.id',
                config('module.psycologicalconditiontypes.table').'.name',
                config('module.psycologicalconditiontypes.table').'.created_by',
                config('module.psycologicalconditiontypes.table').'.status',
                config('module.psycologicalconditiontypes.table').'.created_at',               config('module.psycologicalconditiontypes.table').'.updated_at',
                config('access.users_table').'.first_name as user_name',
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
        //dd($input);
        $psycologicalconditiontype = self::MODEL;

        $psycologicalconditiontype = new $psycologicalconditiontype();
        $input['name'] = $input['name'];
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_by'] = access()->user()->id;
        if ($psycologicalconditiontype->create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.psycologicalconditiontypes.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Psycologicalconditiontype $psycologicalconditiontype
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Psycologicalconditiontype $psycologicalconditiontype, array $input)
    {
        $input['name'] = $input['name'];
        $input['status'] = isset($input['status']) ? 1 : 0;
    	if ($psycologicalconditiontype->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.psycologicalconditiontypes.update_error'));
    }

}
