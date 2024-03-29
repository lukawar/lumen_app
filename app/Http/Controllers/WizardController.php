<?php

namespace App\Http\Controllers;

class WizardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return states list
     *
     * @group  Get responses
     *
     * @return response
     */
    public function getStatesList()
    {
        $states = [
            'województwo dolnośląskie',
            'województwo kujawsko-pomorskie',
            'województwo lubelskie',
            'województwo lubuskie',
            'województwo łódzkie',
            'województwo małopolskie',
            'województwo mazowieckie',
            'województwo opolskie'
        ];
        return Response::json($states);
    }

}

