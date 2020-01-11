<?php
namespace Itegration\News\Controller\Index;

class View extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_request;
	protected $_coreRegistry; 

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Framework\App\Request\Http $request,
		\Magento\Framework\Registry $coreRegistry
	)
	{
		$this->_pageFactory = $pageFactory;
		$this->_request = $request;		
		$this->_coreRegistry = $coreRegistry;
		return parent::__construct($context);
	}

	public function execute()
	{	
		$newsId = $this->_request->getParam('news_id');
		$this->_coreRegistry->register('newsId', $newsId);
		
		return $this->_pageFactory->create();
	}
}
