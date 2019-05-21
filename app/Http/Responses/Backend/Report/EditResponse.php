<?php

namespace App\Http\Responses\Backend\Report;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Report\Report
     */
    protected $reports;

    /**
     * @param App\Models\Report\Report $reports
     */
    public function __construct($reports)
    {
        $this->reports = $reports;
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
        return view('backend.reports.edit')->with([
            'reports' => $this->reports
        ]);
    }
}