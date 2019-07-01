<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 27.06.2019
 * Time: 23:33
 */

namespace Exercise\WeatherModule\App\Interfaces;


interface DatabaseModel
{
    public function getTableWithPrefix();

    public function getIndexFields();
}
