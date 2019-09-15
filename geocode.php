<?php
/**
* Converting address to latitude and longitude
*/
function setLatitudeAndLongitude($address) {
    $address = urlencode($address);
    $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$address."&sensor=true";
    $xml = simplexml_load_file($request_url) or die("url not loading");
    $status = $xml->status;
    if ($status=="OK") {
      $this->latitude = $xml->result->geometry->location->lat;
      $this->longitude = $xml->result->geometry->location->lng;
    }
} 
?>