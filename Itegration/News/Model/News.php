<?php

namespace Itegration\News\Model;

class News extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Itegration\News\Model\ResourceModel\News');
	}
}