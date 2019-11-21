<?php
namespace Test\Checkout1\Model;

use Magento\Quote\Api\Data\AddressInterface;
use Test\Checkout1\Api\PostManagementInterface;
use Magento\Checkout\Model\Session;


class PostManagement implements PostManagementInterface{

    private $_checkoutSession;

    public function __construct(Session $_checkoutSession)
    {
        $this->_checkoutSession = $_checkoutSession;
    }

    public function getPost($param)
    {
        $field = 'additional_field';
        $quote = $this->_checkoutSession->getQuote();
        $quote->setData($field, $param->getExtensionAttributes()->getAdditionalField())->save();
        return true;
    }

}