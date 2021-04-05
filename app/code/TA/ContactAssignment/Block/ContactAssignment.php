<?php
/**
 * @author Bhumik R Panchal
 * @copyright Copyright (c) 2021 TA Digital (https://www.tadigital.com)
 * @package TA_ContactAssignment
 */

namespace TA\ContactAssignment\Block;

use Magento\Framework\View\Element\Template;
use TA\ContactAssignment\Model\ResourceModel\ContactAssignment\CollectionFactory;

/**
 * Contact data front manage block
 */
class ContactAssignment extends Template
{
	/**
     * @var TA\ContactAssignment\Model\ResourceModel\ContactAssignment\CollectionFactory $contactCollectionFactory
     */
    protected $contactCollectionFactory;

	/**
	 * @param Template\Context $context
	 * @param CollectionFactory $contactCollectionFactory
	 */
	public function __construct(
		Template\Context $context,
		CollectionFactory $contactCollectionFactory
	) {
		$this->contactCollectionFactory = $contactCollectionFactory;
		parent::__construct($context);
	}

    /**
     * Prepare layout with pager and get contact collection for front.
     *
     * @return $this
     */
	protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($this->getContactCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'contact.pager'
                )->setAvailableLimit([5 => 5, 10 => 10, 15 => 15, 20 => 20])
                ->setShowPerPage(true)->setCollection(
                    $this->getContactCollection()
                );
            $this->setChild('pager', $pager);
            $this->getContactCollection();
        }
        return $this;
    }

    /**
     * Get Contact collection with page size and current page
     *
     * @return CollectionFactory
     */
    public function getContactCollection()
    {
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : 5;
        $collection = $this->contactCollectionFactory->create();
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        return $collection;
    }

    /**
     * Render pager as HTML and return the result
     *
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
