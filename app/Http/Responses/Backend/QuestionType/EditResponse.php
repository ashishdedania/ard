<?php

namespace App\Http\Responses\Backend\QuestionType;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\QuestionType\Questiontype
     */
    protected $questiontypes;

    /**
     * @param App\Models\QuestionType\Questiontype $questiontypes
     */
    public function __construct($questiontypes)
    {
        $this->questiontypes = $questiontypes;
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
        return view('backend.questiontypes.edit')->with([
            'questiontypes' => $this->questiontypes
        ]);
    }
}