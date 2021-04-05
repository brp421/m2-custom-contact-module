<?php
/**
 * @author Bhumik R Panchal
 * @copyright Copyright (c) 2021 TA Digital (https://www.tadigital.com)
 * @package TA_ContactAssignment
 */

namespace TA\ContactAssignment\Controller\Index;

/**
 * Save contact form data
 */
class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Json\Helper\Data $helper
     */
    protected $helper;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var \TA\ContactAssignment\Model\ContactAssignmentFactory
     */
    protected $_contactFormFactory;


    /**
     * Initialize Save controller
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Json\Helper\Data $helper
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \TA\ContactAssignment\Model\ContactAssignmentFactory $contactFormFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Json\Helper\Data $helper,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \TA\ContactAssignment\Model\ContactAssignmentFactory $contactFormFactory
    ) {
        parent::__construct($context);
        $this->helper = $helper;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_contactFormFactory = $contactFormFactory;
    }

    /**
     * Save contact details on save action
     *
     * @return Magento\Framework\Controller\Result\JsonFactory
     */
    public function execute()
    {
        if($requestData = $this->validatedParams()){
            $resultJson = $this->resultJsonFactory->create();
            try{
                $model = $this->_contactFormFactory->create();
                $model->setData($requestData)->save();
                return $resultJson->setData(['status'=>'success', 'message'=>'Contact saved successfully.']);
            }
            catch(Exception $e){
                return $resultJson->setData(['status'=>'error', 'message'=>'Something went wrong to save contact.']);
            }
        }
    }

    /**
     * Validate all parameters and return the array of param
     * @return array
     */
    private function validatedParams()
    {
        $resultJson = $this->resultJsonFactory->create();
        $request = $this->helper->jsonDecode($this->getRequest()->getContent());
        if($this->validatedName($resultJson, $request)
            && $this->validatedEmail($resultJson, $request)
            && $this->validatedTelephone($resultJson, $request)
            && $this->validatedMessage($resultJson, $request)
        ){
            return $request;
        }
        else{
            return null;
        }
    }

    /**
     * Validate Name
     * @var $resultJson
     * @var $request
     * @return string|boolean
     */
    private function validatedName($resultJson, $request)
    {
        if (array_key_exists('name', $request) && trim($request['name']) === '') {
            return $resultJson->setData(['status'=>'error', 'message'=>'Enter the Name and try again.']);
        }
        return true;
    }

    /**
     * Validate Email
     * @var $resultJson
     * @var $request
     * @return string|boolean
     */
    private function validatedEmail($resultJson, $request)
    {
        if (array_key_exists('email', $request) && false === \strpos($request['email'], '@')) {
            return $resultJson->setData(['status'=>'error', 'message'=>'The email address is invalid. Verify the email address and try again.']);
        }
        return true;
    }

    /**
     * Validate Telephone
     * @var $resultJson
     * @var $request
     * @return string|boolean
     */
    private function validatedTelephone($resultJson, $request)
    {
        if (array_key_exists('telephone', $request) && trim($request['telephone']) === '') {
            return $resultJson->setData(['status'=>'error', 'message'=>'Enter the Telephone and try again.']);
        }
        return true;
    }

    /**
     * Validate Message
     * @var $resultJson
     * @var $request
     * @return string|boolean
     */
    private function validatedMessage($resultJson, $request)
    {
        if (array_key_exists('message', $request) && trim($request['message']) === '') {
            return $resultJson->setData(['status'=>'error', 'message'=>'Enter the message and try again.']);
        }
        return true;
    }
}
