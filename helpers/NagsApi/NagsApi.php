<?php

//  no direct access 
if( !defined('ABSPATH') ) : exit(); endif;

class NagsApi{

    // initializing constants
    private $OMEGA_EDI_API_KEY;
    private $OMEGA_EDI_API_NAGS_VEHICLE_URL;
    private $OMEGA_EDI_API_SEARCH_URL;

    public function __construct() {
        $this->OMEGA_EDI_API_KEY = get_option(NAGS_QUOTING_PLUGIN_NAME . '_api_key');
        $this->OMEGA_EDI_API_NAGS_VEHICLE_URL = get_option(NAGS_QUOTING_PLUGIN_NAME . '_vehicle_url');
        $this->OMEGA_EDI_API_SEARCH_URL = get_option(NAGS_QUOTING_PLUGIN_NAME . '_search_url');
    }

    public function GetYears(){
        // initializing
        $years = [];

        $years = file_get_contents( __DIR__ . '/API-Responses/years.json');
        $years = json_decode($years, true);

        return $years;
    }

    public function GetMake($year){

        // initializing
        $makes = [];

        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL =>  $this->OMEGA_EDI_API_SEARCH_URL . $year,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . $this->OMEGA_EDI_API_KEY,
            ),
            ));
            $makes = curl_exec($curl);
            curl_close($curl);
        } catch (PDOException $e) {
            $makes = [];
        }finally{
            $makes = json_decode($makes, true);
        }

        return $makes;
    }

    public function getModel($year_id, $make_id){

        // initializing
        $models = [];

        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $this->OMEGA_EDI_API_SEARCH_URL . $year_id . '/' . $make_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . $this->OMEGA_EDI_API_KEY,
            ),
            ));
            $models = curl_exec($curl);
            curl_close($curl);
        } catch (PDOException $e) {
            $models = [];
        }finally{
            $models = json_decode($models, true);
        }

        return $models;

    }

    public function getBodyStyle($year_id, $make_id, $model_id){

        // initializing
        $bodyStyles = [];

        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $this->OMEGA_EDI_API_SEARCH_URL . $year_id . '/' . $make_id . '/' . $model_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . $this->OMEGA_EDI_API_KEY,
            ),
            ));
            $bodyStyles = curl_exec($curl);
            curl_close($curl);
        } catch (PDOException $e) {
            $bodyStyles = [];
        }finally{
            $bodyStyles = json_decode($bodyStyles, true);
        }

        return $bodyStyles;

    }

    public function getGlasses($vehicle_id){

        // initializing
        $glasses = [];

        $glasses = [
            "vehicle_id" => $vehicle_id,
            "glass" => [ "WINDSHIELD", "SIDE", "REAR", "OTHER" ],
        ];
        
        return $glasses;

    }

    public function getFeature($data){

        // initializing
        $features = [];
        $load_glass = $data["load_glass"];
        $vehicle_id = $data["vehicle_id"];

        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $this->OMEGA_EDI_API_NAGS_VEHICLE_URL . $vehicle_id . '?load_glass=' . $load_glass,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . $this->OMEGA_EDI_API_KEY,
            ),
            ));
            $features = curl_exec($curl);
            curl_close($curl);
        } catch (PDOException $e) {
            $features = [];
        }finally{
            $features = json_decode($features, true);
        }
        
        return $features;

    }





} 