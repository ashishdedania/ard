<?php

namespace App\Http\Responses\Backend\PsycologicalConditionType;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\PsycologicalConditionType\Psycologicalconditiontype
     */
    protected $psycologicalconditiontypes;

    /**
     * @param App\Models\PsycologicalConditionType\Psycologicalconditiontype $psycologicalconditiontypes
     */
    public function __construct($psycologicalconditiontypes)
    {
        $this->psycologicalconditiontypes = $psycologicalconditiontypes;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.psycologicalconditiontypes.edit')->with([
            'psycologicalconditiontypes' => $this->psycologicalconditiontypes
        ]);
    }
}