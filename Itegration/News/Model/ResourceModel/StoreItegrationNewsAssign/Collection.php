<?php
namespace Itegration\News\Model\ResourceModel\StoreItegrationNewsAssign;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Itegration\News\Model\StoreItegrationNewsAssign', 'Itegration\News\Model\ResourceModel\StoreItegrationNewsAssign');
	}
}