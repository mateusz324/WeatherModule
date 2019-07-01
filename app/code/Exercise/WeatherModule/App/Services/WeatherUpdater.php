<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 01.07.2019
 * Time: 22:43
 */

namespace Exercise\WeatherModule\App\Services;


use Exercise\WeatherModule\App\Libs\WeatherApi\Api;
use Exercise\WeatherModule\App\Libs\WeatherApi\Exceptions\ApiException;

class WeatherUpdater
{
    /**
     * @var Api
     */
    protected $api;
    /**
     * @var \Exercise\WeatherModule\Model\WeatherFactory
     */
    private $weatherFactory;

    public function __construct(Api $api, \Exercise\WeatherModule\Model\WeatherFactory $weatherFactory)
    {
        $this->api = $api;
        $this->weatherFactory = $weatherFactory;
    }

    public function updateWeather()
    {
        try
        {
            $weather = $this->api->getWeather();
            $this->addRecordToDB($weather);
        }
        catch (ApiException $ex)
        {
            $this->addLogs($ex->getMessage(), 'Api Exception');
        }
        catch (\Exception $ex)
        {
            $this->addLogs($ex->getMessage());
        }

    }

    protected function addLogs($data, $type = 'Module Exception')
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/cron.log');

        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($type . ': '. $data . PHP_EOL);

    }

    protected function addRecordToDB($data)
    {
        $model = $this->weatherFactory->create();

        $model->addData([
            'temperature'   => (float) $data->main->temp,
            'clouds'        => (float) $data->clouds->all,
            'wind_speed'    => (float)$data->wind->speed
        ]);

        $saveModel = $model->save();
    }
}
