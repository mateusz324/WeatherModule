<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 01.07.2019
 * Time: 19:17
 */

namespace Exercise\WeatherModule\App\Libs\WeatherApi;


use Exercise\WeatherModule\App\Libs\WeatherApi\Abstracts\AbstractApi;

class Api extends AbstractApi
{
    const UNIT_METRIC = 'metric';
    const UNIT_FAHRENHEIT = 'fahrenheit';

    public function getWeather()
    {
        $response = $this->sendGet([
            'q'         => $this->city,
            'appid'     => $this->appid,
            'units'     => self::UNIT_METRIC
        ]);


        return $this->parseResponse($response);
    }
}
