<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 27.06.2019
 * Time: 23:07
 */

namespace Exercise\WeatherModule\Setup;

use Exercise\WeatherModule\App\Database\WeatherModel;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        if(version_compare($context->getVersion(), '1.1.0', '<'))
        {
            /**
             * @var WeatherModel $model
             */
            $model = new WeatherModel();

            if(!$installer->tableExists($model->getTableWithPrefix()))
            {
                /**
                 * @var Table $table
                 */
                $table = $model->setup($installer);

                $installer->getConnection()->createTable($table);

                $installer->getConnection()->addIndex(
                    $installer->getTable($model->getTableWithPrefix()),
                    $setup->getIdxName(
                        $installer->getTable($model->getTableWithPrefix()),
                        $model->getIndexFields(),
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    $model->getIndexFields(),
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
        }

        $installer->endSetup();
    }
}
