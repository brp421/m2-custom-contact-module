<?php
/**
 * @author Bhumik R Panchal
 * @copyright Copyright (c) 2021 TA Digital (https://www.tadigital.com)
 * @package TA_ContactAssignment
 */

namespace TA\ContactAssignment\Model\ResourceModel;

/**
 * Contact form resource model
 * @package TA\ContactAssignment\Model\ResourceModel
 */
class ContactAssignment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('tadigital_contactassignment', 'id');
    }
}
