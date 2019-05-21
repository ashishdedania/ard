<?php

namespace App\Http\Responses\Backend\Client;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Client\Client
     */
    protected $clients;

    /**
     * @param App\Models\Client\Client $clients
     */
    public function __construct($clients)
    {
        $this->clients = $clients;
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
        return view('backend.clients.edit')->with([
            'clients' => $this->clients
        ]);
    }
}