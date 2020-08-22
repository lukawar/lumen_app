<?php

namespace App\Http\Controllers;

/**
 * @group  Utils
 *
 * APIs for managing data
 */
class UtilsController extends Controller
{
    /**
     * Return states list
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
        return response()->json($states);
    }

}
