<?php

namespace App\Repositories\Backend\Testimonial;

use DB;
use Carbon\Carbon;
use App\Models\Testimonial\Testimonial;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TestimonialRepository.
 */
class TestimonialRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Testimonial::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
                        ->leftJoin(config('module.interventions_type.table'), config('module.interventions_type.table') . '.id', config('module.testimonials.table') . '.intervention_type')
                        ->leftJoin(config('module.clients.table'), config('module.clients.table') . '.id', config('module.testimonials.table') . '.client_id')
                        ->leftJoin(config('access.users_table'), config('access.users_table') . '.id', config('module.clients.table') . '.user_id')
                        ->select([
                            config('module.testimonials.table') . '.id',
                            config('module.testimonials.table') . '.comment',
                            config('module.interventions_type.table') . '.name as intervention',
                            config('module.testimonials.table') . '.created_at',
                            config('module.testimonials.table') . '.updated_at',
                            config('access.users_table') . '.first_name as client',
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
        if (Testimonial::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.testimonials.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Testimonial $testimonial
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Testimonial $testimonial, array $input)
    {
    	if ($testimonial->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.testimonials.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Testimonial $testimonial
     * @throws GeneralException
     * @return bool
     */
    public function delete(Testimonial $testimonial)
    {
        if ($testimonial->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.testimonials.delete_error'));
    }

    public function getintervention_type_id($client_id) {
        //dd($client_id['id']);
        $getintervention_type_id = \DB::table('client_intervention')->where('client_id', $client_id['id'])->get(['intervention_type', 'status'])->toArray();
        //dd($getintervention_type_id);
        return $getintervention_type_id;
    }
    
}
