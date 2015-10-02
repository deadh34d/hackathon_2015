<?php

/**
 * Created by PhpStorm.
 * User: development
 * Date: 8/18/2015
 * Time: 10:22 AM
 */
class Geocoder //do NOT abuse this function. CURLs take a LONG time.
{
    private $apiKey = 'AIzaSyBrxcAIbAUhCs9BKsGUvo4Z1lQBuHLlSBQ';
    private $host = 'https://maps.googleapis.com/maps/api/geocode/json';
    private $address;
    private $request;
    private $json;
    private $response;

    public function __construct($address)
    {
        $address = urlencode($address);
        $this->address = $address;
        $this->request = $this->host . '?address=' . $this->address . '?key=' . $this->apiKey;
        $this->sendCurl($this->request);
    }

    private function sendCurl($request)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $request);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
        $curlData = curl_exec($curl);
        curl_close($curl);
        $this->response = $curlData;
//
//
//        $curl = curl_init($this->$request);
//        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//
//
//        $curl_result = curl_exec($curl);
//        if(!curl_error($curl_result)){
//            return json_decode($curl_result);
//        }else{
//            return curl_error($curl_result);
//        }


    }

    public function returnJSON()
    {
        return json_encode($this->response);
    }

    public function returnArray()
    {
        return json_decode($this->response);
    }
}
