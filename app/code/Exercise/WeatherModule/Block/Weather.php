<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 01.07.2019
 * Time: 21:08
 */

namespace Exercise\WeatherModule\Block;


use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Weather extends Template
{
    /**
     * @var \Exercise\WeatherModule\Model\WeatherFactory
     */
    private $weatherFactory;

    public function __construct(Context $context, \Exercise\WeatherModule\Model\WeatherFactory $weatherFactory)
    {
        $this->weatherFactory = $weatherFactory;

        parent::__construct($context);
    }

    public function getWeatherCollection()
    {
        $weather = $this->weatherFactory->create();
        return $weather->getCollection()->getLastItem()->getData();
    }
}
