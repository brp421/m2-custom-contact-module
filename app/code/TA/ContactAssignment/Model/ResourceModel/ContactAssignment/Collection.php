<?php
/**
 * @author Bhumik R Panchal
 * @copyright Copyright (c) 2021 TA Digital (https://www.tadigital.com)
 * @package TA_ContactAssignment
 */

namespace TA\ContactAssignment\Model\ResourceModel\ContactAssignment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use TA\ContactAssignment\Model\ResourceModel\ContactAssignment as ResourceModel;
use TA\ContactAssignment\Model\ContactAssignment as Model;

/**
 * Contact form collection
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
