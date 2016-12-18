<?php
require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use DeepBreath\Weather\CurrentWeather;
use Philo\Blade\Blade;

$views = __DIR__.'/views';
$cache = __DIR__.'/cache';
$blade = new Blade($views, $cache);
echo $blade->view()->make('hello')->render();

$city = $argv[1];
$apiKey = 'af319cd969dff7d8c42768f6f0d8c979';
$http = new Client();

$weatherApi = new CurrentWeather($http, $apiKey);
$temp = $weatherApi->getTemperature($city);

echo sprintf("Temperature in %s is %s Celsious \n", $city, $temp);
