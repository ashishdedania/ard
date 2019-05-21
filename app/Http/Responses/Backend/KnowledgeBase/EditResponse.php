<?php

namespace App\Http\Responses\Backend\KnowledgeBase;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\KnowledgeBase\Knowledgebase
     */
    protected $knowledgebases;

    /**
     * @param App\Models\KnowledgeBase\Knowledgebase $knowledgebases
     */
    public function __construct($knowledgebases)
    {
        $this->knowledgebases = $knowledgebases;
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
        return view('backend.knowledgebases.edit')->with([
            'knowledgebases' => $this->knowledgebases
        ]);
    }
}