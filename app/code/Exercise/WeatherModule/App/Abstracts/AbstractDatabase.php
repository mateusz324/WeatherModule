<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 27.06.2019
 * Time: 23:32
 */

namespace Exercise\WeatherModule\App\Abstracts;


abstract class AbstractDatabase
{
    /**
     * @var string
     */
    protected $tableName = '';
    /**
     * @var array $indexFields
     */
    protected $indexFields = [];

    /**
     * @return string
     */
    public function getTableWithPrefix()
    {
        return 'exercise_weathermodule_' . $this->tableName;
    }

    /**
     * @return array
     */
    public function getIndexFields()
    {
        return $this->indexFields;
    }
}
