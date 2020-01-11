<?php
namespace Itegration\News\Model\ResourceModel\News;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Itegration\News\Model\News', 'Itegration\News\Model\ResourceModel\News');
	}
}