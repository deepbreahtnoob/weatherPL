<?php
require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use DeepBreath\Weather\CurrentWeather;
use Symfony\Component\Stopwatch\Stopwatch;


$city = $argv[1];
$apiKey = 'af319cd969dff7d8c42768f6f0d8c979';
$http = new Client();

$weatherApi = new CurrentWeather($http, $apiKey);
$stopwatch = new Stopwatch();
$stopwatch->start('termGetWeather');
$temp = $weatherApi->getTemperature($city);
$time = $stopwatch->stop('termGetWeather')->getDuration();
echo sprintf("\nTemperature in %s is %s Celsious \n\nload in %s ms\n", $city, $temp, $time);
