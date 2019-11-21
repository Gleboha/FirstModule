<?php
namespace Test\Checkout1\Api;


interface PostManagementInterface {

    /**
     * POST for Post api
     * @param \Magento\Quote\Api\Data\AddressInterface $param
     * @return boolean
     */
    public function getPost($param);
}