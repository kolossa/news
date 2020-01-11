<?php

namespace Itegration\News\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		
		if (!$installer->tableExists('itegration_news')) {
			
			$table = $installer->getConnection()->newTable(
				$installer->getTable('itegration_news')
			)
				->addColumn(
					'news_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'News ID'
				)
				->addColumn(
					'title',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'title'
				)
				->addColumn(
					'lead',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'lead'
				)
				->addColumn(
					'content',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'64k',
					[],
					'content'
				)
				->addColumn(
					'created',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
					'Created'
				)->addColumn(
					'updated',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated'
				)->addColumn(
					'is_active',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'is active'
				)
				->setComment('News Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('itegration_news'),
				$setup->getIdxName(
					$installer->getTable('itegration_news'),
					['is_active'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_INDEX
				),
				['is_active'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_INDEX
			);
		}
		
		if (!$installer->tableExists('store_itegration_news_assign')) {
			
			$table = $installer->getConnection()->newTable(
				$installer->getTable('store_itegration_news_assign')
			)
				->addColumn(
					'store_itegration_news_assign_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'ID'
				)
				->addColumn(
					'store_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'store id'
				)
				->addColumn(
					'news_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'news id'
				)
				->setComment('store itegration_news assign Table')
				->addIndex(
					$setup->getIdxName(
						$installer->getTable('store_itegration_news_assign'),
						['store_id', 'news_id'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_INDEX
					),
					['store_id', 'news_id'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_INDEX
				)->addForeignKey(
					$setup->getFkName(
						'store_itegration_news_assign',
						'store_id',
						'store',
						'store_id'
					),
					'store_id',
					$setup->getTable('store'),
					'store_id',
					\Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
				)->addForeignKey(
					$setup->getFkName(
						'store_itegration_news_assign',
						'news_id',
						'itegration_news',
						'news_id'
					),
					'news_id',
					$setup->getTable('itegration_news'),
					'news_id',
					\Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
				);
			$installer->getConnection()->createTable($table);

		}
		
		$installer->endSetup();
	}
}