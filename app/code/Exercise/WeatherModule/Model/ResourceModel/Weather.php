<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 26.06.2019
 * Time: 17:06
 */

namespace Exercise\WeatherModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Weather extends AbstractDb
{
    /**
     * Weather constructor.
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('exercise_weathermodule_weather', 'id');
    }
}
