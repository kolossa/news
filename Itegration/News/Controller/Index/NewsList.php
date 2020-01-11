<?php
namespace Itegration\News\Controller\Index;

class NewsList extends \Magento\Framework\App\Action\Action
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
		$storeId = $this->_request->getParam('store_id');
		$this->_coreRegistry->register('storeId', $storeId);
		
		return $this->_pageFactory->create();
	}
}
