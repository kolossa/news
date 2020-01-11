<?php

namespace Itegration\News\Block;

class NewsList extends \Magento\Framework\View\Element\Template
{
	protected $_pageFactory;
	protected $_coreRegistry;
	protected $_newsFactory;
	protected $_assignFactory;
	 
	public function __construct(
			\Magento\Framework\View\Element\Template\Context $context,
			\Magento\Framework\View\Result\PageFactory $pageFactory,
			\Magento\Framework\Registry $coreRegistry,
			\Itegration\News\Model\NewsFactory $newsFactory,
			\Itegration\News\Model\StoreItegrationNewsAssignFactory $assignFactory,
			array $data = []
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_coreRegistry = $coreRegistry;
		$this->_newsFactory = $newsFactory;
		$this->_assignFactory = $assignFactory;
		return parent::__construct($context,$data);
	}
 
	public function execute()
	{
		return $this->_pageFactory->create();
	}

	public function getNews()
	{   	
		$storeId = $this->_coreRegistry->registry('storeId');

		$news = $this->_newsFactory->create();
		
		$collection = $news->getCollection();
		
		return $collection
			//->getSelect()
			//->joinLeft(['assign'=>'store_itegration_news_assign'], 'assign.news_id=news.news_id')
			//->addFieldToFilter('assign.store_id', ['eq'=>$storeId])
			;
	}
}