<?php
/**
 * @author Bhumik R Panchal
 * @copyright Copyright (c) 2021 TA Digital (https://www.tadigital.com)
 * @package TA_ContactAssignment
 */

namespace TA\ContactAssignment\Model;

use TA\ContactAssignment\Model\ResourceModel\ContactAssignment as ResourceModel;
use Magento\Framework\Model\AbstractModel;

/**
 * Contact form model
 */
class ContactAssignment extends AbstractModel
{
    /**
     * Initialize model
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
