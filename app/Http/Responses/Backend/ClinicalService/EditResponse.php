<?php

namespace App\Http\Responses\Backend\ClinicalService;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\ClinicalService\Clinicalservice
     */
    protected $clinicalservices;

    /**
     * @param App\Models\ClinicalService\Clinicalservice $clinicalservices
     */
    public function __construct($clinicalservices)
    {
        $this->clinicalservices = $clinicalservices;
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
        return view('backend.clinicalservices.edit')->with([
            'clinicalservices' => $this->clinicalservices
        ]);
    }
}