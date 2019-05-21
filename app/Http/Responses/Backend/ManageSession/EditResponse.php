<?php

namespace App\Http\Responses\Backend\ManageSession;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\ManageSession\Managesession
     */
    protected $managesessions;

    /**
     * @param App\Models\ManageSession\Managesession $managesessions
     */
    public function __construct($managesessions)
    {
        $this->managesessions = $managesessions;
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
        return view('backend.managesessions.edit')->with([
            'managesessions' => $this->managesessions
        ]);
    }
}