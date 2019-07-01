<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 01.07.2019
 * Time: 19:19
 */

namespace Exercise\WeatherModule\App\Libs\WeatherApi\Abstracts;


use Exercise\WeatherModule\App\Libs\WeatherApi\Exceptions\ApiException;

use GuzzleHttp\Client;

abstract class AbstractApi
{
    /**
     * @var Client $client
     */
    protected $client;

    /**
     * @var string
     */
    protected $endpoint = 'https://api.openweathermap.org/data/2.5/weather';

    /**
     * @var string
     */
    protected $city = 'Lublin,pl';

    /**
     * @var string
     */
    protected $appid = 'dadefc6b621966300850be4175c46862';

    /**
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'application/json'
    ];

    /**
     * AbstractApi constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    protected function getHeaders()
    {
        return $this->headers;
    }

    protected function parseResponse(\GuzzleHttp\Psr7\Response $response)
    {
        $data = $response->getBody()->getContents();

        $this->checkJSON($data);

        return $this->parseJSON($data);
    }

    protected function prepareEndpoint($data = [])
    {
        return $this->endpoint . '?' . http_build_query($data);
    }

    protected function sendGet($data)
    {
        return $this->client->get(
            $this->prepareEndpoint($data),
            [
                'headers' => $this->getHeaders()
            ]);
    }

    private function checkJSON($json)
    {
        json_decode($json);
        if (json_last_error() !== JSON_ERROR_NONE)
        {
            throw new ApiException(json_last_error_msg());
        }
    }

    private function parseJSON($json)
    {
        $response = json_decode($json);

        return ($response === false) ? null : $response;
    }



}
