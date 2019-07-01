<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 26.06.2019
 * Time: 17:02
 */

namespace Exercise\WeatherModule\Model;


use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Weather extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'exercise_weathermodule_weather';

    protected $_cacheTag = 'exercise_weathermodule_weather';

    protected $_eventPrefix = 'exercise_weathermodule_weather';

    protected function _construct()
    {
        $this->_init('Exercise\WeatherModule\Model\ResourceModel\Weather');
    }
    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
