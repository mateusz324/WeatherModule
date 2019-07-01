<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 01.07.2019
 * Time: 18:08
 */

namespace Exercise\WeatherModule\Model\ResourceModel\Weather;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'exercise_weathermodule_weather_collection';
    protected $_eventObject = 'weather_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Exercise\WeatherModule\Model\Weather', 'Exercise\WeatherModule\Model\ResourceModel\Weather');
    }
}
