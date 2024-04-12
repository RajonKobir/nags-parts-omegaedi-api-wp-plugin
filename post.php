<?php

// if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // to access the site's functions
    require_once '../../../wp-config.php';

    if( isset($_POST["vehicle_id"]) ){

        $vehicle_id = $_POST["vehicle_id"];

        // including nags API 
        require_once NAGS_QUOTING_PLUGIN_PATH . 'helpers/NagsApi/NagsApi.php';

        $NagsApi = new NagsApi; 
        $getGlasses = $NagsApi->getGlasses($vehicle_id);

        echo json_encode($getGlasses);
        return;

    }


    if( isset($_POST["GetAllMakeVal"]) && isset($_POST["GetAllYearVal"]) && isset($_POST["GetAllModelVal"]) ){

        $GetAllModelVal = $_POST["GetAllModelVal"];
        $GetAllMakeVal = $_POST["GetAllMakeVal"];
        $GetAllYearVal = $_POST["GetAllYearVal"];

        // including nags API 
        require_once NAGS_QUOTING_PLUGIN_PATH . 'helpers/NagsApi/NagsApi.php';

        $NagsApi = new NagsApi; 
        $getBodyStyle = $NagsApi->getBodyStyle( $GetAllYearVal, $GetAllMakeVal, $GetAllModelVal );

        echo json_encode($getBodyStyle);
        return;

    }


    if( isset($_POST["GetAllMakeVal"]) && isset($_POST["GetAllYearVal"]) ){

        $GetAllMakeVal = $_POST["GetAllMakeVal"];
        $GetAllYearVal = $_POST["GetAllYearVal"];

        // including nags API 
        require_once NAGS_QUOTING_PLUGIN_PATH . 'helpers/NagsApi/NagsApi.php';

        $NagsApi = new NagsApi; 
        $getModel = $NagsApi->getModel( $GetAllYearVal, $GetAllMakeVal );

        echo json_encode($getModel);
        return;

    }


    if( isset($_POST["MakeRequestData"]) ){

        $MakeRequestData = $_POST["MakeRequestData"];

        // including nags API 
        require_once NAGS_QUOTING_PLUGIN_PATH . 'helpers/NagsApi/NagsApi.php';

        $NagsApi = new NagsApi; 
        $GetMake = $NagsApi->GetMake($MakeRequestData);

        echo json_encode($GetMake);
        return;

    }


    if( isset($_POST["zipcode"]) ){

        $response = '';
        $zipcode = $_POST["zipcode"];
        $google_api_key = get_option(NAGS_QUOTING_PLUGIN_NAME . '_google_api_key');

        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?address='.$zipcode.'&key=' . $google_api_key,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        } catch (PDOException $e) {
            $response = $e->getMessage();
        }finally{
            echo $response;
            return;
        }

    }


    if( isset($_POST["get_quotes_vehicle_id"]) ){

        $get_quotes_vehicle_id = $_POST["get_quotes_vehicle_id"];
        $load_glasses = [ "WINDSHIELD", "SIDE", "REAR", "OTHER" ];

        // including nags API 
        require_once NAGS_QUOTING_PLUGIN_PATH . 'helpers/NagsApi/NagsApi.php';

        $NagsApi = new NagsApi; 
        $all_configurations = [];

        foreach( $load_glasses as $load_glass_key => $load_glass_value ){
            $data = [
                "load_glass" => $load_glass_value,
                "vehicle_id" => $get_quotes_vehicle_id,
            ];
            try {
                $getFeature = $NagsApi->getFeature($data);
            } catch (PDOException $e) {
                $getFeature = [];
            }finally{
                if( isset($getFeature["NagsGlass"]) ){
                    $NagsGlasses = $getFeature["NagsGlass"];
                    if( count( $NagsGlasses ) > 0 ){
                        foreach( $NagsGlasses as $NagsGlass_key => $NagsGlass_value){
                            if( isset($NagsGlass_value["Configurations"]) ){
                                $Configurations = $NagsGlass_value["Configurations"];
                                if( count( $Configurations ) > 0 ){
                                    foreach( $Configurations as $Configuration_key => $Configuration_value){
                                        array_push($all_configurations, $NagsGlasses);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if( $load_glass_key < 3 ){
                sleep(1);
            }
        }

        // $data = [
        //     "load_glass" => $load_glasses[0],
        //     "vehicle_id" => $get_quotes_vehicle_id,
        // ];
        // try {
        //     $getFeature = $NagsApi->getFeature($data);
        // } catch (PDOException $e) {
        //     $getFeature = [];
        // }

        echo json_encode($all_configurations);
        return;

    }


}
// if POST request ends here