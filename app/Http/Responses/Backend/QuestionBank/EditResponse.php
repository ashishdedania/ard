<?php

namespace App\Http\Responses\Backend\QuestionBank;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\QuestionBank\Questionbank
     */
    protected $questionbanks;

    /**
     * @param App\Models\QuestionBank\Questionbank $questionbanks
     */
    public function __construct($questionbanks)
    {
        $this->questionbanks = $questionbanks;
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
        return view('backend.questionbanks.edit')->with([
            'questionbanks' => $this->questionbanks
        ]);
    }
}