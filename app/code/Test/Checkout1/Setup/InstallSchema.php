<?php
namespace Test\Checkout\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableQuote = $setup->getTable('quote');
        $tableOrder = $setup->getTable('sales_order');

        if($conn->isTableExists($tableQuote) == true){

            $columns = [
                'additional_field' => [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => false,
                    'comment' => 'Additional Field',
                ],

            ];

            foreach ($columns as $name => $definition) {
                $conn->addColumn($tableQuote, $name, $definition);
            }
        }

        if($conn->isTableExists($tableOrder) == true){

            $columns = [
                'additional_field' => [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => false,
                    'comment' => 'Additional Field',
                ],

            ];

            foreach ($columns as $name => $definition) {
                $conn->addColumn($tableOrder, $name, $definition);
            }
        }


        $setup->endSetup();
    }
}
?>