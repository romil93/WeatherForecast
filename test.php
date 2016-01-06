<?php

    header('Access-Control-Allow-Origin: *');

    function get_data($url, $temp) {
        $xmlString = file_get_contents("https://maps.googleapis.com/maps/api/geocode/xml?address=".$url."&sensor=false&key=GOOGLE_API_KEY");

        $xml = simplexml_load_string($xmlString);
        if($xml->result->geometry->location->lat && $xml->result->geometry->location->lng) {
            $lat = $xml->result->geometry->location->lat;
            $longi = $xml->result->geometry->location->lng;

            $forecastString = file_get_contents("https://api.forecast.io/forecast/FORECAST_KEY/".$lat.",".$longi."?units=".$temp."&exclude=flags");

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
        $temp = $_POST['temperature'];
        
        $string = $street_address.", ".$city_name.", ".$state;
        $string = str_replace (" ", "+", urlencode($string));
        $json_string = get_data($string, $temp);
        echo json_encode($json_string);
    }
    else {
        $street_address = $_GET['street_address'];
        $city_name = $_GET['city_name'];
        $state = $_GET['state'];
        $temp = $_GET['temperature'];
        
        $string = $street_address.", ".$city_name.", ".$state;
        $string = str_replace (" ", "+", urlencode($string));
        $json_string = get_data($string, $temp);
        echo json_encode($json_string);
    }
?>
