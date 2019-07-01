<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 01.07.2019
 * Time: 22:33
 */

namespace Exercise\WeatherModule\Cron;


class UpdateWeather
{

    /**
     * @var \Exercise\WeatherModule\App\Services\WeatherUpdater
     */
    private $weatherUpdater;

    public function __construct(\Exercise\WeatherModule\App\Services\WeatherUpdater $weatherUpdater)
    {
        $this->weatherUpdater = $weatherUpdater;
    }

    public function execute()
    {
        $this->weatherUpdater->updateWeather();

        return $this;
    }
}
