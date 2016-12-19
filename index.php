<?php
require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use DeepBreath\Weather\CurrentWeather;
use Jenssegers\Blade\Blade;
use Symfony\Component\Stopwatch\Stopwatch;


$views = __DIR__.'/views';
$cache = __DIR__.'/cache';
$blade = new Blade($views, $cache);

$time = 0;

$city = $_POST['city'];
$apiKey = 'af319cd969dff7d8c42768f6f0d8c979';
if ($city != '') {
 $http = new Client();
 $weatherApi = new CurrentWeather($http, $apiKey);
 $stopwatch = new Stopwatch();
 $stopwatch->start('weatherRecive');
 $temp = $weatherApi->getTemperature($city);
 $weatherReciveTime = $stopwatch->stop('weatherRecive');
 $time = $weatherReciveTime->getDuration();
};


echo $blade->make('content', ['temp' => $temp, 'city' => $city, 'time' => $time]);
