<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 26.06.2019
 * Time: 16:58
 */

namespace Exercise\WeatherModule\App\Database;

use Exercise\WeatherModule\App\Abstracts\AbstractDatabase;
use Exercise\WeatherModule\App\Interfaces\DatabaseModel;
use Magento\Framework\Setup\SchemaSetupInterface;

class WeatherModel extends AbstractDatabase implements DatabaseModel
{
    protected $tableName = 'weather';

    protected $indexFields = [
        'clouds',
    ];

    public function setup(SchemaSetupInterface $installer)
    {
        $table = $installer->getConnection()
                    ->newTable(
                        $installer->getTable($this->getTableWithPrefix())
                    )->addColumn(
                        'id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary'  => true,
                            'unsigned' => true,
                        ],
                        'Record ID'
                    )
                    ->addColumn(
                        'temperature',
                        \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                        10,
                        [],
                        'Temperature'
                    )
                    ->addColumn(
                        'clouds',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        100,
                        [],
                        'Clouds'
                    )->addColumn(
                        'wind_speed',
                        \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                        10,
                        [],
                        'Wind Speed'
                    )->addColumn(
                        'created_at',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                        'Created At'
                    )->addColumn(
                        'updated_at',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                        'Updated At')
                    ->setComment('Weather Details');

        return $table;
    }
}
