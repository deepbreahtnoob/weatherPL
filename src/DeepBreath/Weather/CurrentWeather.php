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

  public function getTemperature($city)
  {
    $url = $this->buildUrl($city);
    $response = $this->http->request('GET', $url);
    $rawData = $response->getBody();
    $data = json_decode($rawData, true);
    $temp = $data['main']['temp'];

    return $temp; 
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

