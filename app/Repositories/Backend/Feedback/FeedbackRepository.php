<?php

namespace App\Repositories\Backend\Feedback;

use DB;
use Carbon\Carbon;
use App\Models\Feedback\Feedback;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeedbackRepository.
 */
class FeedbackRepository extends BaseRepository {

    /**
     * Associated Repository Model.
     */
    const MODEL = Feedback::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable() {
        return $this->query()
                        ->leftJoin(config('module.interventions_type.table'), config('module.interventions_type.table') . '.id', config('module.feedback.table') . '.intervention_type')
                        ->leftJoin(config('module.clients.table'), config('module.clients.table') . '.id', config('module.feedback.table') . '.client_id')
                        ->leftJoin(config('access.users_table'), config('access.users_table') . '.id', config('module.clients.table') . '.user_id')
                        ->select([
                            config('module.feedback.table') . '.id',
                            config('module.feedback.table') . '.comment',
                            config('module.interventions_type.table') . '.name as intervention',
                            config('module.feedback.table') . '.ratings',
                            config('module.feedback.table') . '.created_at',
                            config('module.feedback.table') . '.updated_at',
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
    public function create(array $input) {
        if (Feedback::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.feedback.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Feedback $feedback
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Feedback $feedback, array $input) {
        if ($feedback->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.feedback.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Feedback $feedback
     * @throws GeneralException
     * @return bool
     */
    public function delete(Feedback $feedback) {
        if ($feedback->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.feedback.delete_error'));
    }

    public function getintervention_type_id($client_id) {
        //dd($client_id['id']);
        $getintervention_type_id = \DB::table('client_intervention')->where('client_id', $client_id['id'])->get(['intervention_type', 'status'])->toArray();
        //dd($getintervention_type_id);
        return $getintervention_type_id;
    }

    public function getClientFeedback() {
        $getknowledgebase = Client::with('users', 'feedback')
                        ->where('user_id', access()->user()->id)->paginate(4);

        return $getClientFeedback;
    }

}
