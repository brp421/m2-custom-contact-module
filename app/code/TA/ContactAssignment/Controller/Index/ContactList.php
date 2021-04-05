<?php
/**
 * @author Bhumik R Panchal
 * @copyright Copyright (c) 2021 TA Digital (https://www.tadigital.com)
 * @package TA_ContactAssignment
 */

namespace TA\ContactAssignment\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

/**
 * Retrive contact list in front
 */
class ContactList extends \Magento\Framework\App\Action\Action
{
    /**
     * Show Contact List page
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}