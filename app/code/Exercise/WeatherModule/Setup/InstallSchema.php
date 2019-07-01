<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 26.06.2019
 * Time: 09:34
 */

namespace Exercise\WeatherModule\Setup;


use Exercise\WeatherModule\App\Database\WeatherModel;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        /**
         * @var WeatherModel $model
         */
        $model = new WeatherModel();

        if(!$installer->tableExists($model->getTableWithPrefix()))
        {
            /**
             * @var SchemaSetupInterface $table
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

        $installer->endSetup();
    }
}
