<?php

namespace App\Repositories\Backend\ClinicalService;

use DB;
use Carbon\Carbon;
use App\Models\ClinicalService\Clinicalservice;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClinicalserviceRepository.
 */
class ClinicalserviceRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Clinicalservice::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
         ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.clinicalservices.table').'.created_by')
            ->select([
                config('module.clinicalservices.table').'.id',
                config('module.clinicalservices.table').'.name',
                config('module.clinicalservices.table').'.created_by',
                config('module.clinicalservices.table').'.status',
                config('module.clinicalservices.table').'.created_at',
                config('module.clinicalservices.table').'.updated_at',
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
        $clinicalservice = self::MODEL;
        $clinicalservice = new $clinicalservice();
        $input['name'] = $input['name'];
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_by'] = access()->user()->id;
        if ($clinicalservice->create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.clinicalservices.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Clinicalservice $clinicalservice
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Clinicalservice $clinicalservice, array $input)
    {
        $input['name'] = $input['name'];
        $input['status'] = isset($input['status']) ? 1 : 0;
    	if ($clinicalservice->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.clinicalservices.update_error'));
    }

}
