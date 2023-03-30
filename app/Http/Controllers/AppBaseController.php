<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use App\Models\Currency;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public  $GET_ALL_CURRENCY;
    public  $API_KEY;

    public function __construct(){
        $this->GET_ALL_CURRENCY='https://api.apilayer.com/fixer/latest';
        $this->API_KEY='z4upFdco3il1m1EFHiRFOSoth2IbJ2m0';
    }
 
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    public function getAllCurrencies(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->GET_ALL_CURRENCY,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'apikey: '.$this->API_KEY
          ),
        ));
        
        $response = curl_exec($curl);
        $response=(array)json_decode($response);
        curl_close($curl);
        $rates=(array)$response["rates"];
       foreach ($rates as $key => $value) {
      $value=  number_format((float)$value, 2, '.', '');
        Currency::create(['name' => $key,'rate'=>$value,'final_rate'=>$value]);
        // echo 'key is :- ' .$key .'& value= '.$value;
        echo "true";
       }
    }


}
