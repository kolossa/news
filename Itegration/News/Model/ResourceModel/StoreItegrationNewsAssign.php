<?php 

namespace Itegration\News\Model\ResourceModel;

class StoreItegrationNewsAssign extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('store_itegration_news_assign', 'store_itegration_news_assign_id');
	}
}