<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Webpatser\Uuid\Uuid;

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
    public function getStatesList(): JsonResponse
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

    /**
     * Return mixed string
     *
     * @return response
     */
    public function getMixedString(Request $request): JsonResponse
    {
        $response = null;
        if (is_array($request->strings)) {
            foreach ($request->strings as $s)
                $response .= $s;

            //$response = str_shuffle($response);
            $response = preg_replace('/[^0-9a-zA-Z\-]+/', '', $response);
            //$response = $this->str2url($response);
        }
        return response()->json(['mixed' => $response]);
    }

    /**
     * Return UUID
     *
     * @return response
     */
    public function getUUID(): JsonResponse
    {
        return response()->json(['uuid' => Uuid::generate()->string]);
    }

    private function str2url($str, $replace = "-")
    {
        $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

        $charsArr = array('^', "'", '"', '`', '~');
        $str = str_replace($charsArr, '', $str);

        $return = trim(preg_replace(' +', ' ', preg_replace('/[^a-zA-Z0-9s]/', '', strtolower($str))));
        return str_replace(' ', $replace, $return);
    }
}
