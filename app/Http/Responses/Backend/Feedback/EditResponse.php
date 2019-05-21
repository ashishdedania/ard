<?php

namespace App\Http\Responses\Backend\Feedback;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Feedback\Feedback
     */
    protected $feedback;

    /**
     * @param App\Models\Feedback\Feedback $feedback
     */
    public function __construct($feedback)
    {
        $this->feedback = $feedback;
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
        return view('backend.feedback.edit')->with([
            'feedback' => $this->feedback
        ]);
    }
}