<?php
namespace DeepBreath\Weather;

class CurrentWeather
{
  const ENDPOINT = 'http://api.openweathermap.org/data/2.5/weather';
  private $apiKey;
  private $http;
  public function __construct($http, $apiKey)
  {
    $this->apiKey = $apiKey;
    $this->http = $http;
  }
 
  public function getTemperature($city) {
   $filename = 'temp/'.$city.'.json';


   if (!file_exists($filename) or (time()-filemtime($filename) >= 120 )){
     $rawData = $this->getTemperatureJson($city);
   } else {
      $rawData = $this->getTemperatureFromFile($city);
   }
   $temp = $this->decodeResponse($rawData);
   return $temp;
  }
  private function getTemperatureJson($city)
  {
    $url = $this->buildUrl($city);
    $response = $this->http->request('GET', $url);
    $rawData = $response->getBody();
    $this->storeJson($rawData, $city);

    return $rawData;
  }
  private function decodeResponse($rawData){
     $data = json_decode($rawData, true);
     $temp = $data['main']['temp'];

     return $temp;

  }
  private function getTemperatureFromFile($n){
    $nameJs = 'temp/'.$n.'.json';
    $file = file_get_contents($nameJs, true);
    return $file;
  }
  private function storeJson($response, $name){
    $fp = fopen('temp/'.$name.'.json', 'w');
    fwrite($fp, $response);
    fclose($fp);
  }

  private function buildUrl($city)
  {
    $url = sprintf(
      '%s?q=%s&APPID=%s&units=metric',
      self::ENDPOINT,
      $city,
      $this->apiKey
    );
    return $url;
  }
}

