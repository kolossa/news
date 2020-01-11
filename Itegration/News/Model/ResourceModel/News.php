<?php 

namespace Itegration\News\Model\ResourceModel;

class News extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
		$this->_init('itegration_news', 'news_id');
	}
}