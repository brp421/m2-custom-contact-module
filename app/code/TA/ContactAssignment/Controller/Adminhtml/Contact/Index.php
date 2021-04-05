<?php
/**
 * @author Bhumik R Panchal
 * @copyright Copyright (c) 2021 TA Digital (https://www.tadigital.com)
 * @package TA_ContactAssignment
 */
 
namespace TA\ContactAssignment\Controller\Adminhtml\Contact;

class Index extends \Magento\Backend\App\Action
{   
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    /**
     * Get contact page result for grid
     *
     * @return Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('TA_ContactAssignment::contactassignment');
        $resultPage->addBreadcrumb(__('Contacts'), __('Contacts'));
        $resultPage->getConfig()->getTitle()->prepend(__('Contact List'));

        return $resultPage;
    }
}?>