<?php

    header('Access-Control-Allow-Origin: *');

    function get_data($url) {
        $xmlString = file_get_contents("https://maps.googleapis.com/maps/api/geocode/xml?address=".$url."&sensor=false&key=GOOGLE_MAP_JS_KEY");

        $xml = simplexml_load_string($xmlString);
        if($xml->result->geometry->location->lat && $xml->result->geometry->location->lng) {
            $lat = $xml->result->geometry->location->lat;
            $longi = $xml->result->geometry->location->lng;

            $forecastString = "";

            if($temp == "C"){
                $forecastString = file_get_contents("https://api.forecast.io/forecast/FORECAST_KEY/".$lat.",".$longi."?units=si&exclude=flags");
            } else {
                $forecastString = file_get_contents("https://api.forecast.io/forecast/FORECAST_KEY/".$lat.",".$longi."?units=us&exclude=flags");
            }

            $forecast = json_decode($forecastString);

            return $forecastString;
        } else {
            return false;    
        }
    }

    if(isset($_POST)) {
        $street_address = $_POST['street_address'];
        $city_name = $_POST['city_name'];
        $state = $_POST['state'];
        
        $string = $street.", ".$city.", ".$state;
        $string = str_replace (" ", "+", urlencode($string));
        $json_string = get_data($string);
        echo $string;
    }
?>
