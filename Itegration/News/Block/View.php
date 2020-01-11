<?php

namespace Itegration\News\Block;

class View extends \Magento\Framework\View\Element\Template
{
	protected $_pageFactory;
	protected $_coreRegistry;
	protected $_newsFactory; 
	 
	public function __construct(
			\Magento\Framework\View\Element\Template\Context $context,
			\Magento\Framework\View\Result\PageFactory $pageFactory,
			\Magento\Framework\Registry $coreRegistry,
			\Itegration\News\Model\NewsFactory $newsFactory,
			array $data = []
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_coreRegistry = $coreRegistry;
		$this->_newsFactory = $newsFactory;
		return parent::__construct($context,$data);
	}
 
	public function execute()
	{
		return $this->_pageFactory->create();
	}

	public function getNews()
	{   	
		$newsId = $this->_coreRegistry->registry('newsId');
		$news = $this->_newsFactory->create();
		$result = $news->load($newsId);
		$result = $result->getData();
		
		return $result;
	}
}