<?php

namespace Itegration\News\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	protected $_newsFactory;
	protected $_assignFactory;

	public function __construct(\Itegration\News\Model\NewsFactory $newsFactory, \Itegration\News\Model\StoreItegrationNewsAssignFactory $assignFactory)
	{
		$this->_newsFactory = $newsFactory;
		$this->_assignFactory = $assignFactory;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		for($i=1;$i<=10;$i++){
			$data = [
				'title' => 'test title '.$i.'.',
				'lead' => 'test lead '.$i.'.',
				'content' => 'Magni suscipit sed odit qui. Libero id quam explicabo et velit sint cupiditate voluptatibus. Eligendi perspiciatis repellendus cupiditate ut nisi. Possimus consequatur aut velit autem. Quo non est excepturi ea incidunt harum eum. Voluptate saepe aut eius commodi alias repellat harum. '.$i.'.',
				'is_active' => 1,
			];
			$news = $this->_newsFactory->create();
			$news->addData($data)->save();
			
			$assignData=[
				'store_id' => 1,
				'news_id' => $news->getNewsId(),
			];
			$assign=$this->_assignFactory->create();
			$assign->addData($assignData)->save();
		}
	}
}